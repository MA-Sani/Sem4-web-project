let guests = [];

function checkIn() {
  const nameInput = document.getElementById('name');
  const roomInput = document.getElementById('room');
  const name = nameInput.value;
  const room = roomInput.value;

  guests.push({ name, room });

  nameInput.value = '';
  roomInput.value = '';

  updateStatus();
}

function checkOut() {
  const roomNumberInput = document.getElementById('roomNumber');
  const roomNumber = roomNumberInput.value;

  guests = guests.filter(guest => guest.room !== roomNumber);

  roomNumberInput.value = '';

  updateStatus();
}

function updateStatus() {
  const statusList = document.getElementById('status-list');
  statusList.innerHTML = '';

  guests.forEach(guest => {
    const listItem = document.createElement('li');
    listItem.textContent = `${guest.name} - Room ${guest.room}`;
    statusList.appendChild(listItem);
  });
}