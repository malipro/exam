<template>
    <div>


        <div class="panel panel-default">
            <div class="panel-heading">products list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>color</th>
                        <th>price</th>
                        <th>description</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product, index) in products">
                        <td>{{ product.name }}</td>
                        <td>{{ product.color }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.description }}</td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            products: []
        }
    },
    mounted() {
        var app = this;
        axios.get('/api/v1/products')
            .then(function (resp) {
                app.products = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not load products");
            });
    },
    methods: {

    }
}
</script>
