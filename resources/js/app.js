import { Script } from 'vm';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.start();
$(document).ready(function () {
    $('#usuarios').DataTable();
});