<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: #15c;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .button {
            display: inline-block;
            background: #15c;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
        .button:hover {
            background: #0e3a8a;
        }
        .footer {
            background: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 10px;
            margin: 20px 0;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📚 Hệ thống Quản lý Sách</h2>
        </div>
        
        <div class="content">
            <h3>Xin chào!</h3>
            
            <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
            
            <p>Nếu bạn thực hiện yêu cầu này, vui lòng nhấn vào nút bên dưới:</p>
            
            <div style="text-align: center;">
                <a href="{{ $url }}" class="button">🔐 Đặt lại mật khẩu</a>
            </div>
            
            <p>Hoặc sao chép và dán link sau vào trình duyệt:</p>
            <p style="background: #f4f4f4; padding: 10px; border-radius: 4px; word-break: break-all;">
                <a href="{{ $url }}">{{ $url }}</a>
            </p>
            
            <div class="warning">
                <strong>⚠️ Lưu ý:</strong> Link đặt lại mật khẩu này có hiệu lực trong <strong>60 phút</strong>.<br>
                Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.
            </div>
        </div>
        
        <div class="footer">
            <p>© 2024 Hệ thống Quản lý Sách. Mọi quyền được bảo lưu.</p>
            <p>Email này được gửi tự động, vui lòng không trả lời.</p>
        </div>
    </div>
</body>
</html>