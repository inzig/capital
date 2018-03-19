<template>
    <div id="transactionsList">
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>Date/Time</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Explorer</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td>{{item.timeStamp | humanReadableDate}}</td>
                <td v-html="$options.filters.weiToEth(item.value)"></td>
                <td v-html="$options.filters.prettyStatus(item.txreceipt_status)"></td>
                <td v-html="$options.filters.exploreLink(item.hash)"></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        name: 'ethereumtransactionshistory',
        props: {
            'to_address': {
                type: String,
                required: true
            },
            'from_address': String,
            'network': {
                type: String,
                required: true,
                validator: function (value) {
                    var allowedNetworks = ['api', 'ropsten', 'kovan', 'rinkeby'];
                    return allowedNetworks.indexOf(this.network) === -1;
                }
            }
        },
        data: function() {
            return {items: []};
        },
        mounted() {
            this.loadTransactions(1);
        },
        filters: {
            prettyStatus: function (value) {
                if(value == 0) {
                    return '<span class="label label-danger">Failed</span>';
                } else {
                    return '<span class="label label-success">Suceeded</span>';
                }
            },
            exploreLink: function (value) {
                return '<a href="https://etherscan.io/tx/'+value+'" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>';
            },
            humanReadableDate: function (value) {
                return moment.unix(value).format('YYYY-MM-DD HH:mm:ss');
            },
            weiToEth: function (value) {
                return value/1000000000000000000;
            }
        },
        methods : {
            loadTransactions: function (page) {
                var self = this;
                $.ajax({
                    url: 'https://'+this.network+'.etherscan.io/api?module=account&action=txlist&address='+this.to_address+'&page='+page+'&offset=1000&sort=asc&apikey=freekey',
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var transactionsByFromAddress = data.result;

                        if ('from_address' in self.$options.propsData) {
                            transactionsByFromAddress = data.result.filter(function(tx){
                                return (self.from_address == tx.from && tx.to != '');
                            });
                        }

                        if (transactionsByFromAddress.length > 0) {
                            self.items = self.items.concat(transactionsByFromAddress);
                        }

                        if (data.result.length > 0) {
                            self.loadTransactions(page+1);
                        }
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        }
    }
</script>
