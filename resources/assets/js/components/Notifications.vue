<template>
	<div class="dropdown-menu">
		<a href="#" class="dropdown-item" v-for="notification in notifications">
			{{ notification.data.message }}
		</a>
	</div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                notifications: []
            }
        },
        mounted() {
            axios.get('/api/notifications')
                .then(response => {
                    this.notifications = response.data;

                    Echo.private(`App.User.${this.user}`)
                        .notification(notification => {
                            Push.config({
                                serviceWorker: "./sw.js"
                            });
                            Push.create("Castex App", {
                                body: "Tienes una nueva notificacion!",
                                icon: "hospital-icon.png",
                                link: "home",
                                vibrate: [200,100,200,100,200,100],
                                onClick: function () {
                                    window.focus();
                                    this.close();
                                }
                            });
                            this.notifications.unshift(notification);
                        });
                });
        }
    }
</script>