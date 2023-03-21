@extends('FrontEnd.master')
@section('title')
    Phim hay 2022 - Liên hệ tôi
@endsection 
@section('content')
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px; margin-top:80px; margin-bottom:150px;">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="halim-panel-filter">
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="card-body">
                        
                        <div class="col-md-3">
                            <img src="users/images/{{Auth::user()->image}}" class="img-circle elevation-2 admin_picture" alt="User Image">
                            
                            <li class="list-info-group-item" style="margin-top: 10px; margin-left:30px;"><span>Admin</span> : 
                                <span class="quality">@Eang Sokunthea </span>
                            </li>

                            <li class="list-info-group-item" style="margin-left:30px;"><span>Tell</span> : 
                                <span class="quality">08884545552 </span>
                            </li>

                            <li class="list-info-group-item" style="margin-left:30px;"><span>Email</span> : 
                                <span class="quality">&#160;sokuntheaeang198@gmail.com </span>
                            </li>

                            <li class="list-info-group-item" style="margin-left:30px;"><span>FB</span> : 
                                <span class="quality">&#160;https://www.facebook.com/eang.sokunthea.566 </span>
                            </li>

                            <!-- <li class="list-info-group-item"><span>CopyRight </span> : 
                                <span class="episode">{{$info->copyright}} </span>
                            </li> -->
                        </div>
                        <div class="col-md-8" >
                        <!-- <h3 class="text-center" style="font-weight: 500;">Xin Chào Quý Khách </h3><br> -->
                            <!-- <p style="margin-top: 15px; text-align:center;"> Mọi người có thể tham khảo thông tin của tôi ở đây nhé :)) </p> -->

                            <ul class="list-info-group" style="margin-top: 30px;">
                                <li class="list-info-group-item" style="text-align: justify;">
                            
                                    <b>1. Khảo sát hiện trạng</b>
                                    <p>
                                        Web xem phim là nơi tổng hợp nhiều thể loại phim khác nhau nhằm làm thỏa
                                        mãn nhu cầu xem phim, mang lại sự thích thú và những trải nghiệm thú vị cho
                                        người xem. Thay vì tìm kiếm những bộ phim rời rạc trên các trang khác thì việc
                                        xem trên một trang web xem phim chính thống được tổng hợp đầy đủ các thể loại,
                                        giao diện, hình ảnh chất lượng vẫn thu hút lượng người xem hơn rất nhiều. Mà để
                                        thu hút nhiều người xem vào truy cập thì việc thiết kế web xem phim free online
                                        cũng là một công đoạn quan trọng trong xã hội hiện này.
                                    </p>
                                    <b>2. Mục tiêu và phạm vi đề tài</b>
                                    <p>
                                        Mục tiêu chính của của đề tài này là thiết kế xây dựng một hệ thống xem phim
                                        free online để giúp người xem năm rõ những thông tin chính xác về thông tin, các
                                        tin chất lượng mới nhất về các bộ phim đã ra mắt, cũng như những thông tin các
                                        phim sắp xa mắt, ... mà mọi người muốn tận hưởng trong những lúc rảnh rỗi, không
                                        mất tiền và mất thời gian đi xem phim ở chiều rạp hoặc trình duyệt khác.
                                        Qua tìm hiểu và khảo sát các hệ thống đã có cùng với nhu cầu của người xem
                                        phim hệ thống được xây dựng sẽ gồm các tác nhân và chức năng sau:

                                        <br>
                                        <b>- Người xem:</b>
                                        Người xem khi chưa đăng ký, người xem có thể: <br>
                                        • Đăng ký: Khi người xem chưa có tài khoản đăng nhập, trước tiên phải đăng kí
                                        nếu muốn xem các phim trong trang web. <br>
                                        • Tìm kiếm các phim: Theo cách tìm kiếm trên ô tìm kiếm và tìm trên nav bar
                                        như danh mục, thể loại, quốc gia, năm phim.Hoặc là có thể tìm kiếm phim đã
                                        trình diễn trên trên trang web home. <br>
                                        • Xem chi tiết thông tin phim: Chỗ này nếu người xem muốn xem chi tiết thông
                                        tin phim họ chỉ cần vào chọn phim bất kì muốn xem và nó sẽ hiện ra các chi
                                        tiết thông tin để xem. <br>
                                        • Dịch tiếng toàn trang: Web này em để dùng 5 tiếng để cho người dùng càng
                                        dễ dọc khi dùng trang web, 5 tiếng gồm có: tiếng anh, tiếng khmer,tiếng việt,
                                        tiếng trung quốc và tiếng thái. <br>
                                        • Tối/Sáng(Light/Dark) toàn trang: Việc này thêm vào để dễ cho người xem
                                        muốn xem trang web càng rõ hơn. <br>
                                        • Xem thông tin của website: Ở trang liên hệ thì người xem có thể xem các chi
                                        tiết thông tin của website mà quản trị viên đã nhập vào.
                                        <br>
                                        <b>- Người dùng:</b>
                                        Khi người dùng đã đăng nhập tài khoản, ngoài vai trò đăng ký,tìm kiếm, xem
                                        chi tiết thông tin phim, dịch tiếng đọc, chọn đổi chức năng tối/sáng toàn trang và
                                        xem thông tin website người dùng có thể: <br>
                                        • Đánh giá sao phim: Ở bên dưới ảnh chi tiết thông tin phim có ảnh sao đánh
                                        giá sao của phim, người dùdùng muốn đánh giá thì chỉ chọn select trên ảnh
                                        sao và bấm, nó sẽ hiện thống báo đánh giá thành công. Lúc đó sao màu vàng
                                        sẽ hiện trong trang ngay. <br>
                                        • Xem phim: Sau khi đăng nhập xong, người dùng có thể vào chọn phim bất kì
                                        và nó hiện ra trang xem chi tiết thông tin phim, chọn ảnh chi tiết phim nó sẽ
                                        hiện video phim theo phim bộ phim lẻ mà muốn xem. <br>
                                        • Bình luận phim: Trong trang xem chi tiết thông tin phim sẽ có bình luận ở
                                        dưới trang, người dùng muốn góp ý kiến của phim nào đó thì có thể vào và
                                        nhập tên và nội dùng ý kiến rồi gửi đi, sau đó chờ bên quản trị viên bỏ duyệt
                                        mới thấy hiện ra những nội dùng ý kiến của mình trên trang. <br>
                                        • Xem thông tin của cá nhân: Người dùng có thể vào xem thông tin cá nhân của
                                        mình chỉ cần bấm vào ảnh tài khoản và chọn “thông tin cá nhân”. Nó sẽ hiện
                                        ra thông tin cá nhân của người dùng.

                                    </p>
                                    <b>3. Định hướng giải pháp</b>
                                    <p>
                                        Từ việc xác định rõ nhiệm vụ cần giải quyết ở trên để xây dưng ứng dụng này
                                        em sử dụng công nghệ ngôn ngữ PHP với framwork laravel, cơ sở dữ liệu MySQL
                                        ở phía backend và ngôn ngữ HTML, CSS, JS, cùng với đó là thư viện boostrap,
                                        Jquery để xây dựng giao diện trang website này.
                                    </p>
                                    <b>4. Kết quả đạt được</b>
                                    <p>
                                        Sau khi thực hiện đồ án, em đã thành công xây dựng được hệ thống website xem
                                        phim free online với các chức năng đã nêu, giao diện đẹp dễ sử dụng, hỗ trợ đầy
                                        đủ tính năng, giúp giải quyết các khó khăn trở thành dễ dàng hơn, hệ thống có các
                                        tính năng nổi bật như:
                                    </p>
                                    <b>&nbsp;&nbsp; a, Trang chủ</b>
                                    <p>
                                        • Thiết kế web xem phim trang chủ với các module chính: Tìm kiếm, phim bộ,
                                        phim lẻ, phim hot, phim xem nhiều, đăng ký, đăng nhập, nút cho tối/sáng,
                                        translate tiếng đọc.
                                        <br>
                                        • Thiết kế giao diện đẹp, duy nhất, chuẩn HTML/CSS, có Jquery, sử dụng được
                                        trên nhiều trình duyệt.
                                    </p>
                                    <b>&nbsp;&nbsp; b, Module đăng ký, đăng nhập thành viên</b>
                                    <p>
                                        • Đăng ký hoặc đăng nhập thành viên website trước khi xem phim.
                                    </p>
                                    <b>&nbsp;&nbsp; c, Module xem phim online</b>
                                    <p>
                                        • Liệt kê tất cả các phim trên hệ thống, phân loại theo thể loại, quốc gia, danh
                                        mục, năm phim, lọc phim.
                                        <br>
                                        • Liệt kê các phim bộ, phim lẻ.
                                        <br>
                                        • Bình luận phim bằng nhập tên và nội dùng.
                                        <br>
                                        • Đánh giá sao phim.
                                        <br>
                                        • Hiển thị thông tin chi tiết của phim.
                                        <br>
                                        • Xem phim theo tập phim.
                                    </p>
                                    <b>&nbsp;&nbsp; d, Module xem, thêm, sửa và xóa</b>
                                    <p>
                                        • Quản trị viên có thể vào xem, thêm, sửa và xóa các thông tin muốn cập nhập
                                        trên trang web.
                                        <br>
                                        • Duyệt bình luận và trả lời bình luận từ người dùng.
                                    </p>
                                    
                                </li>
                                
                                
                                
                            </ul>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
            </div>
        </div>
    </div>
    
@endsection    
