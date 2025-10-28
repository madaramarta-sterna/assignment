import axios from 'axios';
window.axios = axios;
import './custom';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
