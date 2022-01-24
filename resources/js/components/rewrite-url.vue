<script>
    export default {
        props: ['url'],
        mounted () {
            window.location.href = this.url;
        }
    }
</script>