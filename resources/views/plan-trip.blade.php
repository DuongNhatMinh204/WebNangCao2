<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flight Booking Information</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/css/plan-trip.css">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      font-size: 18px;
      text-align: left;
    }

    table th,
    table td {
      padding: 12px;
      border: 1px solid #ddd;
    }

    table th {
      background-color: #f2f2f2;
    }

    .btn-container {
      text-align: center;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      margin: 5px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .btn.cancel {
      background-color: #f44336;
      color: white;
    }

    .btn.pay {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>

<body>
  <header>
    <a href="#" class="logo"><span>Future</span>Wonders</a>
    <nav class="bar">
      <a href="home">Home</a>
      <a href="booking">Booking</a>
      <a href="trending">Trending</a>
      <a href="news">News</a>
      <a href="package">Packages</a>
      <a href="services">Services</a>
      <a href="gallery">Gallery</a>
      <a href="review">Review</a>
      <a href="contact">Contact</a>
      <a href="plan-trip" class="indam">Pay</a>
    </nav>
    <div class="icons">
      <a href=""><i class="fas fa-search" id="search-btn"></i></a>
      <a href="user"><i class="fas fa-user" id="login-btn"></i></a>
    </div>
  </header>

  <h1 class="heading">
    <span>f</span>
    <span>l</span>
    <span>i</span>
    <span>g</span>
    <span>h</span>
    <span>t</span>
    <span>-</span>
    <span>b</span>
    <span>o</span>
    <span>o</span>
    <span>k</span>
    <span>i</span>
    <span>n</span>
    <span>g</span>
  </h1>

  <!-- Flight Booking Information Table -->
  <div class="flight-info">
    <h2>Thông Tin Chuyến Đi Đã Đặt</h2>
    <table>
      <thead>
        <tr>
          <th>Select</th>
          <th>Mã Chuyến Đi</th>

          <th>Địa Điểm</th>
          <th>Số Người Đi</th>
          <th>Check-in Time</th>
          <th>Check-out Time</th>
          <th>Khách Sạn</th>
          <th>Tình Trạng Thanh Toán</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <td><input type="checkbox" class="select-trip" data-id="{{ $booking->id }}"></td>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->palaceName }}</td>
            <td>{{ $booking->numberOfPeople }}</td>
            <td>{{ $booking->checkinTime }}</td>
            <td>{{ $booking->checkoutTime }}</td>
            <td>{{ $booking->hotel }}</td>
            <td>Chưa Thanh Toán</td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <div class="btn-container">
      <button class="btn cancel" id="cancel-btn">Hủy Chuyến</button>
      <button class="btn pay" id="pay-btn">Thanh Toán</button>
    </div>
    <div id="qr-container" style="display:none; text-align:center; margin-top:20px;">
      <img id="qr-code" src="/images/qr.jpg" alt="QR Code for Payment" style="width:200px;">
    </div>
  </div>

</body>
<script>
  document.getElementById('pay-btn').addEventListener('click', function () {
    // Show QR code when "Thanh Toán" button is clicked
    document.getElementById('qr-container').style.display = 'block';
  });

</script>
<
<script>
  document.getElementById('cancel-btn').addEventListener('click', function () {
    const selectedRow = document.querySelector('input[type="checkbox"]:checked');
    if (selectedRow) {
      const tripId = Number(selectedRow.closest('tr').querySelector('td:nth-child(2)').innerText);

      fetch(`/booking/delete/${tripId}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
        }
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Hủy chuyến thành công");
            selectedRow.closest('tr').remove(); // Xóa dòng đã chọn khỏi bảng
          } else {
            alert(data.message || "Không thể hủy chuyến");
          }
        })
        .catch(error => {
          console.error('Lỗi khi hủy chuyến:', error);
          alert("Đã xảy ra lỗi khi hủy chuyến.");
        });
    } else {
      alert("Vui lòng chọn một chuyến đi để hủy");
    }
  });

  document.getElementById('pay-btn').addEventListener('click', function () {
    alert('Thanh toán thành công!');
  });

</script>

</html>