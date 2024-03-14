import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import sticky from 'alpinejs-sticky';

import * as Sentry from "@sentry/browser";

Sentry.init({
    dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
});

Alpine.plugin(sticky);

Livewire.start();

Echo.private('App.Models.User.' + 1)
    .notification((notification) => {
        console.log(notification.type);
    });
