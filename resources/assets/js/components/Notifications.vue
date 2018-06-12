<template>
	<li class="nav-item dropdown">
		<a :class="[{disabled: isEmpty()}, 'nav-link', 'dropdown-toggle']" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Notificaciones <span class="badge badge-primary"> {{ notifications.length }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a href="#" @click="resolveNotification(index)" class="dropdown-item" v-for="(notification, index) in notifications">
				{{ notification.data.message }}
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" @click="deleteNotifications()" class="dropdown-item text-danger text-center">Eliminar Todas</a>
		</div>
	</li>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                notifications: []
            }
        },
        mounted: function () {
            axios.get(`/api/v1/notifications/${this.user}`)
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
                                vibrate: [200, 100, 200, 100, 200, 100],
                                onClick: function () {
                                    window.focus();
                                    this.close();
                                }
                            });
                            this.notifications.unshift(notification);
                        });
                });
        },
		methods: {
            resolveNotification: function (notificationIndex) {
                let notification = this.notifications[notificationIndex]
                axios.delete(`/api/v1/notification/${this.user}/${notification.id}`)
                    .then(() => {
                        this.notifications.splice(notificationIndex, 1)
                    });
            },
            deleteNotifications: function () {
				axios.delete(`/api/v1/notifications/${this.user}`)
					.then(() => {
					   this.notifications = []
					});
            },
			isEmpty: function () {
				return this.notifications.length === 0
            }
		}
    }
</script>