import './bootstrap';

import Alpine from 'alpinejs';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

window.Alpine = Alpine;

Alpine.start();


window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;



// function clearErrorSession() {
//     // Send an AJAX request to the server to clear the error session
//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', '/clear-error-session', true);
//     xhr.send();
  
//     // Reload the page after clearing the error session
//     xhr.onload = function() {
//       if (xhr.status === 200) {
//         location.reload();
//       }
//     };
//   }