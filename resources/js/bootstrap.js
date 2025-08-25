import axios from 'axios';
window.axios = axios;

import jQuery from 'jquery';
window.$ = jQuery;

import Swal from 'sweetalert2';
window.Swal = Swal

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import './components/account';