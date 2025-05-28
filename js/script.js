// Események betöltése
if (document.getElementById('event-list')) {
  fetch('api/events.php')
    .then(res => res.json())
    .then(events => {
      const list = document.getElementById('event-list');
      events.forEach(event => {
        const div = document.createElement('div');
        div.innerHTML = `<h2>${event.name}</h2><p>${event.date}</p><a href="event.html?id=${event.id}">Részletek</a>`;
        list.appendChild(div);
      });
    });
}

// Részletek betöltése
if (document.getElementById('event-details')) {
  const params = new URLSearchParams(location.search);
  const id = params.get('id');
  fetch(`api/events.php?id=${id}`)
    .then(res => res.json())
    .then(event => {
      const details = document.getElementById('event-details');
      details.innerHTML = `
        <h2>${event.name}</h2>
        <p>${event.description}</p>
        <p>${event.date} @ ${event.location}</p>
        <h3>Jelentkezők:</h3>
        <ul id="registration-list">
          ${
            event.registrations.length
              ? event.registrations.map(r => `<li>${r.name} (${r.email})</li>`).join('')
              : '<li>Nincs jelentkező</li>'
          }
        </ul>
        <button onclick="history.back()"> Vissza</button>
      `;
    });
}