function convertDateTimeFormat(inputDateTime) {
    // Tạo một đối tượng Date từ chuỗi đầu vào
    const dateObj = new Date(inputDateTime);

    // Lấy thông tin ngày, tháng, năm, giờ, phút, giây
    const year = dateObj.getFullYear();
    const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
    const day = dateObj.getDate().toString().padStart(2, '0');
    const hours = dateObj.getHours().toString().padStart(2, '0');
    const minutes = dateObj.getMinutes().toString().padStart(2, '0');
    const seconds = dateObj.getSeconds().toString().padStart(2, '0');

    // Tạo chuỗi định dạng mới
    const formattedDateTime = `${hours}:${minutes}:${seconds} ${day}-${month}-${year}`;

    return formattedDateTime;
}