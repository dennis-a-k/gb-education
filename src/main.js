import cart from './CartComponent'
import products from './ProductComponent'
import search from './SearchComponent'
import error from './ErrorComponent'

const app = {
    el: '#e-shop',
    components: {
        cart,
        products,
        error,
        'search': search
      },
    methods: {
        getJson(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => this.$refs.error.setText(error))
        },
        postJson(url, data){
            return fetch(url, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
                .then(result => result.json())
                .catch(error => this.$refs.error.setText(error))
        },
        putJson(url, data){
            return fetch(url, {
                method: 'PUT',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
                .then(result => result.json())
                .catch(error => this.$refs.error.setText(error))
        },
        delJson(url, data){
            return fetch(url, {
                method: 'DELETE',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
                .then(result => result.json())
                .catch(error => this.$refs.error.setText(error))
        },
    },
};

export default app