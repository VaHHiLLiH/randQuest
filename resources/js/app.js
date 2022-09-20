import { createApp } from 'vue';

import openingMenu from './components/logout';

const app = createApp({});

app.component('openingMenu', openingMenu);

app.mount('#myPeace');

