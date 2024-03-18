import './bootstrap';
import './notifications.js';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import sticky from 'alpinejs-sticky';

import * as Sentry from "@sentry/browser";

Sentry.init({
    dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
});

Alpine.plugin(sticky);

Livewire.start();
