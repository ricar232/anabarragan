// Simulación de datos para la tabla
const users = [
    { name: 'Juan Pérez', email: 'juan@example.com', phone: '555-1234' },
    { name: 'Ana Gómez', email: 'ana@example.com', phone: '555-5678' },
    { name: 'Luis Rodríguez', email: 'luis@example.com', phone: '555-9876' }
];

// Llenar la tabla dinámicamente
const userTable = document.getElementById('user-table');
users.forEach(user => {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${user.name}</td>
        <td>${user.email}</td>
        <td>${user.phone}</td>
        <td>
            <button class="btn-edit"><i class="fas fa-edit"></i> Editar</button>
            <button class="btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
        </td>
    `;
    userTable.appendChild(row);
});

// Configuración del gráfico
const ctx = document.getElementById('myChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Usuarios Activos', 'Usuarios Inactivos', 'Usuarios Nuevos'],
        datasets: [{
            data: [60, 30, 10], // Simulación de datos
            backgroundColor: ['#007bff', '#28a745', '#ffc107'],
            hoverOffset: 10
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
});
