<template>
    <div v-bind:class="{'is_alert': alert}">
        <i class="fa fa-comments"></i>
        <span>
            {{messageCount}}
        </span>
    </div>
</template>

<script>
    export default {
        props: [
            'user'
        ],
        data() {
            return {
                messageCount: 0,
                alert: false
            }
        },

        mounted() {
            Echo.join(`chats.${this.user.id}`)
                .here(user => {
                    console.log('Here');
                })
                .listen('NewChat', (e) => {

                    this.alert = true;

                    toastr.success(`New message hass been sent`);

                    this.messageCount = this.messageCount +=1;

                    console.log(this.messageCount);
                });
        }
    }
</script>

<style scoped>
    .is_alert {
        color: yellow;
    }

    .is_alert {
    animation: blink-animation 1s steps(5, start) infinite;
    -webkit-animation: blink-animation 1s steps(5, start) infinite;
    }
    @keyframes blink-animation {
    to {
        visibility: hidden;
    }
    }
    @-webkit-keyframes blink-animation {
    to {
        visibility: hidden;
    }
    }
</style>
