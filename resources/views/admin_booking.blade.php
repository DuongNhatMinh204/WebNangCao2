<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/css/admin_booking.css">
</head>
<body>

<header>
    <a href="#" class="logo"><span>Future</span>Wonders</a>
    <nav class="bar">
        <a href="" class="indam">Trip Management</a>
        <a href="admin">Account Management</a>
    </nav>
    <div class="icons">
        <a href=""><i class="fas fa-search" id="search-btn"></i></a>
        <a href="user"><i class="fas fa-user" id="login-btn"></i></a>
    </div>
</header>

<h2>Hotel Booking Management</h2>

<input type="text" id="bookingInput" onkeyup="filterBookingTable()" placeholder="Enter customer name or room to search...">

<div id="booking-section">
    <div id="booking-table-container">
        <table id="bookingTable">
            <thead>
                <tr>
                    <th>Id Trip</th>
                    <th>User Id</th>
                    <th>Palacename</th>
                    <th>Number of people</th>
                    <th>Check-in Time</th>
                    <th>Check-out Time</th>
                    <th>Hotel</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user_id }}</td>
                    <td>{{ $booking->palaceName }}</td>
                    <td>{{ $booking->numberOfPeople }}</td>
                    <td>{{ $booking->checkinTime }}</td>
                    <td>{{ $booking->checkoutTime }}</td>
                    <td>{{ $booking->hotel }}</td>
                    <td>Chưa thanh toán</td>
                    <td>
                        <form action="{{ route('admin.deleteBooking', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function filterBookingTable() {
        let input = document.getElementById("bookingInput").value.toLowerCase();
        let rows = document.querySelectorAll("#bookingTable tbody tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(input) ? "" : "none";
        });
    }
</script>

</body>
</html>
