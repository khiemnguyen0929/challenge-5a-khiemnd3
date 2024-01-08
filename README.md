# challenge5a_khiemnd3

## Yêu cầu:

Lập trình bằng ngôn ngữ PHP (yêu cầu không sử dụng framework có sẵn), sử dụng DB MySQL để xây dựng website quản lý thông tin sinh viên, tài liệu của 1 lớp học.

### Yêu cầu ứng dụng:

- Giao diện website rõ ràng, sạch đẹp (có sử dụng HTML, CSS để định dạng và thiết kế website) (1đ)

### Yêu cầu chức năng:

- Giáo viên có thể thêm, sửa, xóa các thông tin của sinh viên. Thông tin có các trường cơ bản gồm: tên đăng nhập, mật khẩu, họ tên, email, số điện thoại (1đ)

- Sinh viên sau khi đăng nhập được phép thay đổi các thông tin của mình, cho phép upload avatar từ file hoặc url; sinh viên không được phép thay đổi tên đăng nhập và họ tên (1đ).

- Một người dùng (giáo viên hoặc sinh viên) bất kỳ đc phép xem danh sách các người dùng trên website và xem thông tin chi tiết của một người dùng khác. Tại trang xem thông tin chi tiết của một người dùng có mục để lại tin nhắn cho người dùng đó, có thể sửa/xóa tin nhắn đã gửi (2đ).

- Chức năng giao bài, trả bài:
    - Giáo viên có thể upload file bài tập lên. Các sinh viên có thể xem danh sách bài tập và tải file bài tập về (1đ).
    - Sinh viên có thể upload bài làm tương ứng với bài tập được giao. Chỉ giáo viên mới nhìn thấy danh sách bài làm này (1đ).

- Tạo chức năng cho phép giáo viên tổ chức 1 trò chơi giải đố như sau:
    - Giáo viên tạo challenge, trong đó cần thực hiện: upload lên 1 file txt có nội dung là 1 bài thơ, văn,…, tên file được viết dưới định dạng không dấu và các từ cách nhau bởi 1 khoảng trắng. Sau đó nhập gợi ý về challenge và submit. (Đáp án chính là tên file mà giáo viên upload lên. Không lưu đáp án ra file, DB,…) (1đ)


## Outline:

User:

`/login`

`/logout`

Giáo viên:

`/students`: Thêm/sửa/xóa các thông tin của sinh viên: tên đăng nhập, mật khẩu họ tên, email, sdt

`/exercises`: Upload file bài tập lên, sinh viên chỉ có thể xem danh sách bài tập và tải file btap về

`/challenges`: Giáo viên tạo challenge, upload 1 file txt có nội dung là 1 bài văn hoặc thơ, tên file ko dấu vào cách nhau bởi khoảng trắng, đáp án chính là tên file

Sinh viên:

`/me`: Thay đổi các thông tin của mình (upload avt từ file hoặc url), Sinh viên không được phép đổi tên đăng nhập hoặc họ tên.

`/exercises`: sinh viên có thể upload bài tập tương ứng, Chỉ giáo viên mới thấy được danh sách này

`/challenges`: Sinh viên xem gợi ý và nhập đáp án, đúng thì trả về nội dung của file txt.

Admin:

`/admin`: Xem danh sách của người dùng trên website, Xem thông tin chi tiết của người dùng khác, để lại tin nhắn cho người dùng đó.
