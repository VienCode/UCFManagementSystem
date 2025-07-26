  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Evangelism Activity</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <aside class="sidebar">
      <div class="logo">
        <img src="assets/logo.png" alt="Logo">
      </div>
      <nav>
        <ul>
          <li>
            <a href="#">
              <img src="assets/pictureuser.png" alt="User Account Icon">
              Account Name
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/user-check.png" alt="User Check Icon">
              Attendance
            </a>
          </li>
          <li class="active">
            <a href="evangelismmain.php">
              <img src="assets/mass.png" alt="Evangelism Icon">
              Evangelism
            </a>
          </li>
          <li>
            <a href="donations.php">
              <img src="assets/donate.png" alt="Donations Icon">
              Donations
            </a>
          </li>
          <li>
            <a href="churchupdates.php">
              <img src="assets/announcement.png" alt="Updates Icon">
              Church Updates
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/group.png" alt="Group Icon">
              Cell Group<br>Management
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header class="header">
        <h1><span class="pursuit">Unity</span> <span class="of">Christian</span> <span class="truth">Fellowship</span></h1>
        <p class="verse">Evangelism View</p>
      </header>

      <section class="table-section">
        <div class="table-header">
          <h2>LIST OF VIP’s DURING EVANGELISM ACTIVITY</h2>
          <input type="text" id="searchInput" placeholder="Search VIP name...">
        </div>

        <!-- Add Form -->
        <form id="addForm">
          <input type="text" id="firstName" placeholder="First Name" required>
          <input type="text" id="lastName" placeholder="Last Name" required>
          <input type="date" id="date" required>
          <input type="text" id="contact" placeholder="Contact (11 digits)" pattern="\d{11}" title="Please enter exactly 11 digits" required>
          <button type="submit">Add VIP</button>
        </form>

        <table id="vipTable">
          <thead>
            <tr>
              <th>FIRST NAME</th>
              <th>LAST NAME</th>
              <th>DATE</th>
              <th>CONTACT</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>MELISSA</td>
              <td>BALITIAN</td>
              <td>2025-07-07</td>
              <td>09636547211</td>
              <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Hidden Edit Form -->
        <form id="editForm" style="display:none;">
          <h3>Edit VIP</h3>
          <input type="text" id="editFirstName" required>
          <input type="text" id="editLastName" required>
          <input type="date" id="editDate" required>
          <input type="text" id="editContact" placeholder="Contact (11 digits)" pattern="\d{11}" title="Please enter exactly 11 digits" required>
          <button type="submit">Update</button>
          <button type="button" id="cancelEdit">Cancel</button>
        </form>
      </section>
    </main>

    <script>
      const tableBody = document.getElementById('vipTable').getElementsByTagName('tbody')[0];
      const searchInput = document.getElementById('searchInput');
      const addForm = document.getElementById('addForm');
      const editForm = document.getElementById('editForm');
      let currentEditingRow = null;

      searchInput.addEventListener('keyup', () => {
        const filter = searchInput.value.toUpperCase();
        const rows = tableBody.getElementsByTagName('tr');
        for (let row of rows) {
          const cells = row.getElementsByTagName('td');
          let match = Array.from(cells).some(cell => cell.textContent.toUpperCase().includes(filter));
          row.style.display = match ? '' : 'none';
        }
      });

      addForm.addEventListener('submit', e => {
        e.preventDefault();
        const contact = document.getElementById('contact').value;
        if (!/^\d{11}$/.test(contact)) {
          alert("Contact must be exactly 11 digits.");
          return;
        }

        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const date = document.getElementById('date').value;

        const row = tableBody.insertRow();
        row.innerHTML = `
          <td>${firstName}</td>
          <td>${lastName}</td>
          <td>${date}</td>
          <td>${contact}</td>
          <td>
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
          </td>
        `;
        addForm.reset();
      });

      tableBody.addEventListener('click', e => {
        const target = e.target;
        const row = target.closest('tr');

        if (target.classList.contains('delete-btn')) {
          row.remove();
        }

        if (target.classList.contains('edit-btn')) {
          currentEditingRow = row;
          const cells = row.querySelectorAll('td');
          document.getElementById('editFirstName').value = cells[0].textContent;
          document.getElementById('editLastName').value = cells[1].textContent;
          document.getElementById('editDate').value = cells[2].textContent;
          document.getElementById('editContact').value = cells[3].textContent;
          editForm.style.display = 'flex';
          scrollToForm(editForm);
        }
      });

      editForm.addEventListener('submit', e => {
        e.preventDefault();
        const contact = document.getElementById('editContact').value;
        if (!/^\d{11}$/.test(contact)) {
          alert("Contact must be exactly 11 digits.");
          return;
        }

        const cells = currentEditingRow.querySelectorAll('td');
        cells[0].textContent = document.getElementById('editFirstName').value;
        cells[1].textContent = document.getElementById('editLastName').value;
        cells[2].textContent = document.getElementById('editDate').value;
        cells[3].textContent = contact;
        editForm.reset();
        editForm.style.display = 'none';
      });

      document.getElementById('cancelEdit').addEventListener('click', () => {
        editForm.style.display = 'none';
        editForm.reset();
      });

      function scrollToForm(form) {
        form.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    </script>
  </body>
  </html>