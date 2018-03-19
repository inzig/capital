<template>
    <div id="cryptosList">
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <td>Rank</td>
                <td>Name</td>
                <td>Symbol</td>
                <td>Price (USD)</td>
                <td>1H</td>
                <td>1D</td>
                <td>1W</td>
                <td>Market Cap (USD)</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="coin in coins">
                <td>{{ coin.rank }}</td>
                <td><img v-bind:src="getCoinImage(coin.symbol)"> {{ coin.name }}</td>
                <td>{{ coin.symbol }}</td>
                <td>{{ coin.price_usd | currency }}</td>
                <td v-bind:style="getColor(coin.percent_change_1h)">
                    <span v-if="coin.percent_change_1h > 0">+</span>{{ coin.percent_change_1h }}%
                </td>
                <td v-bind:style="getColor(coin.percent_change_24h)">
                    <span v-if="coin.percent_change_24h > 0">+</span>{{ coin.percent_change_24h }}%
                </td>
                <td v-bind:style="getColor(coin.percent_change_7d)">
                    <span v-if="coin.percent_change_7d > 0">+</span>{{ coin.percent_change_7d }}%
                </td>
                <td>{{ coin.market_cap_usd | currency }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    export default {
        name: 'cryptoscompare',
        props: ['limit'],
        data: function () {
            return {
                coins: [],
                coinData: {}
            };
        },
        methods: {
            getCoinData: function () {
                let self = this;

                $.ajax({
                    url: 'https://min-api.cryptocompare.com/data/all/coinlist',
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        self.coinData = response.Data;
                        self.getCoins();
                    },
                    error: function (error) {
                        self.getCoins();
                        console.error(error);
                    }
                });
            },
            getCoins: function () {
                let self = this;

                $.ajax({
                    url: 'https://api.coinmarketcap.com/v1/ticker/?limit='+this.limit,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        self.coins = response;
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            },
            getCoinImage: function (symbol) {
                symbol = (symbol === "MIOTA" ? "IOT" : symbol);
                symbol = (symbol === "VERI" ? "VRM" : symbol);

                return 'https://www.cryptocompare.com' + this.coinData[symbol].ImageUrl;
            },
            getColor: function (num) {
                return num > 0 ? "color:green;" : "color:red;";
            }
        },
        created()
        {
            this.getCoinData();

            setInterval(function () {
                this.getCoinData();
            }.bind(this), 600000);
        }
    }
</script>
