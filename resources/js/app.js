import { createApp } from 'vue';

import openingMenu from './components/logout';
import RestorePassword from './components/RestorePassword';

const app = createApp({});

app.component('openingMenu', openingMenu);
app.component('RestorePassword', RestorePassword);

app.mount('#myPeace');

