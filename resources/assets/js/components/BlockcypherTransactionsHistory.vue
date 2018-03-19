<template>
    <div id="transactionsList">
        <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Date/Time</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Explorer</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td>{{item.timestamp | humanReadableDate}}</td>
                    <td>{{item.from}}</td>
                    <td>{{item.value}}</td>
                    <td v-html="$options.filters.prettyStatus(item.success)"></td>
                    <td v-html="$options.filters.exploreLink(item.hash)"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        name: 'blockcyphertransactionshistory',
        props: ['address'],
        data: function() {
            return {items: []};
        },
        mounted() {
            var self = this;
            $.ajax({
                url: 'https://api.blockcypher.com/v1/btc/main/addrs/'+this.address+'/full',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    self.items = data;
                },
                error: function (error) {
                    console.error(error);
                }
            });
        },
        filters: {
            prettyStatus: function (value) {
                if(value === false) {
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
            }
        }
    }
</script>
