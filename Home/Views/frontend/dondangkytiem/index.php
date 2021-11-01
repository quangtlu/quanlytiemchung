<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>
    <script src="./select-province.js"></script>

</head>

<body>
    <div id="tinhvn"></div>
    <script>
    SelectProvince({
        target: "#tinhvn",
        on: data => {
            console.log(data)
        }
    })
    </script>
    <?php $this->view('frontend.public.headerHome') ?>
    <!-- main -->
    <?php 
        if($success != ''){
            echo 
            "<div class='alert alert-success' id='success-alert' style='top:100px'>
            
            <strong>$success !</strong>
          </div>";
        }
        if($danger != ''){
            echo "<div class='alert alert-danger' id='success-alert' style='top:100px'>
            
            <strong>$danger !</strong>
          </div>";
        }
    ?>
    <div class="container animate__animated animate__fadeIn mb-5">
        <h2 class="mt-4" style="color:var(--primary-color);font-weight:bold">Thông tin đăng ký</h2>
        <form action="./index.php?controller=dondangkytiem&action=register&phone=<?php echo $_SESSION['phone'] ?>"
            method="POST" class="needs-validation" novalidate>
            <div id="muitiem" class="form-row">
                <div class="col-md-4 mb-6">
                    <label for="muitiemthu" class="form-label">Mũi tiêm thứ</span></label>
                    <input name="muitiemthu" disabled value="<?php echo $count ?>" name="muitiemthu"
                        class="form-control" id="muitiemthu">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="uutien">Nhóm đối tượng ưu tiên<span
                            class="require">(*)</span></label>
                    <select id="uutien" required class="form-control form-select" name="uutien">
                        <option value=""></option>
                        <optgroup>
                            <option title="1. Người làm việc trong các cơ sở y tế, ngành y tế (công lập và tư nhân)">
                                1. Người làm việc trong các cơ sở y tế, ngành y tế (công lập và tư nhân)
                            </option>
                            <option
                                title="2. Người tham gia phòng chống dịch (Thành viên Ban chỉ đạo phòng, chống dịch các cấp, người làm việc ở các khu cách ly, 
                    làm nhiệm vụ truy vết, điều tra dịch tễ, tổ Covid dựa vào cộng đồng, tình nguyện viên, phóng viên...)">
                                2. Người tham gia phòng chống dịch (Thành viên Ban chỉ đạo phòng, chống dịch các cấp,
                                người làm việc ở các khu cách ly,
                                làm nhiệm vụ truy vết, điều tra dịch tễ, tổ Covid dựa vào cộng đồng, tình nguyện viên,
                                phóng viên...)
                            </option>
                            <option title="3. Lực lượng Quân đội">
                                3. Lực lượng Quân đội
                            </option>
                            <option title="4. Lực lượng Công an">
                                4. Lực lượng Công an
                            </option>
                            <option
                                title="5. Nhân viên, cán bộ ngoại giao của Việt Nam và thân nhân được cử đi nước ngoài; người làm việc trong các cơ quan Ngoại giao, Lãnh sự, các tổ chức quốc tế hoạt động tại Việt Nam">
                                5. Nhân viên, cán bộ ngoại giao của Việt Nam và thân nhân được cử đi nước ngoài; người
                                làm việc trong các cơ quan Ngoại giao, Lãnh sự, các tổ chức quốc tế hoạt động tại Việt
                                Nam
                            </option>
                            <option title="6. Hải quan, cán bộ làm công tác xuất nhập cảnh">
                                6. Hải quan, cán bộ làm công tác xuất nhập cảnh
                            </option>
                            <option
                                title="7. Người cung cấp dịch vụ thiết yếu: hàng không, vận tải, du lịch; cung cấp dịch vụ điện, nước">
                                7. Người cung cấp dịch vụ thiết yếu: hàng không, vận tải, du lịch; cung cấp dịch vụ
                                điện, nước
                            </option>
                            <option
                                title="8. Giáo viên, người làm việc, học sinh, sinh viên tại các cơ sở giáo dục, đào tạo; lực lượng bác sỹ trẻ; người làm việc tại các cơ quan, đơn vị hành chính; các tổ chức hành nghề luật sư, công chứng, đấu giá... thường xuyên tiếp xúc với nhiều người">
                                8. Giáo viên, người làm việc, học sinh, sinh viên tại các cơ sở giáo dục, đào tạo; lực
                                lượng bác sỹ trẻ; người làm việc tại các cơ quan, đơn vị hành chính; các tổ chức hành
                                nghề luật sư, công chứng, đấu giá... thường xuyên tiếp xúc với nhiều người
                            </option>
                            <option title="9. Người mắc các bệnh mạn tính; Người trên 65 tuổi">
                                9. Người mắc các bệnh mạn tính; Người trên 65 tuổi
                            </option>
                            <option title="10. Người sinh sống tại các vùng có dịch">
                                10. Người sinh sống tại các vùng có dịch
                            </option>
                            <option title="11. Người nghèo, các đối tượng chính sách xã hội">
                                11. Người nghèo, các đối tượng chính sách xã hội
                            </option>
                            <option
                                title="12. Người được cơ quan nhà nước có thẩm quyền cử đi công tác, học tập, lao động ở nước ngoài hoặc có nhu cầu xuất cảnh để công tác, học tập và lao động ở nước ngoài; chuyên gia nước ngoài làm việc tại Việt Nam">
                                12. Người được cơ quan nhà nước có thẩm quyền cử đi công tác, học tập, lao động ở nước
                                ngoài hoặc có nhu cầu xuất cảnh để công tác, học tập và lao động ở nước ngoài; chuyên
                                gia nước ngoài làm việc tại Việt Nam
                            </option>
                            <option
                                title="13. Các đối tượng là người lao động, thân nhân người lao động đang làm việc tại các doanh nghiệp (bao gồm cả doanh nghiệp trong khu công nghiệp, khu chế xuất, doanh nghiệp kinh doanh vận tải, tín dụng, du lịch...), cơ sở kinh doanh dịch vụ thiết yếu như các cơ sở lưu trú, ăn uống, ngân hàng, chăm sóc sức khỏe, dược, vật tư y tế...cơ sở bán lẻ, bán buôn, chợ, công trình xây dựng, người dân ở vùng, khu du lịch">
                                13. Các đối tượng là người lao động, thân nhân người lao động đang làm việc tại các
                                doanh nghiệp (bao gồm cả doanh nghiệp trong khu công nghiệp, khu chế xuất, doanh nghiệp
                                kinh doanh vận tải, tín dụng, du lịch...), cơ sở kinh doanh dịch vụ thiết yếu như các cơ
                                sở lưu trú, ăn uống, ngân hàng, chăm sóc sức khỏe, dược, vật tư y tế...cơ sở bán lẻ, bán
                                buôn, chợ, công trình xây dựng, người dân ở vùng, khu du lịch
                            </option>
                            <option title="14. Các chức sắc, chức việc các tôn giáo">
                                14. Các chức sắc, chức việc các tôn giáo
                            </option>
                            <option
                                title="16. Các đối tượng khác theo Quyết định của Bộ trưởng Bộ Y tế hoặc Chủ tịch Ủy ban nhân dân tỉnh, thành phố và đề xuất của các đơn vị viện trợ vắc xin cho Bộ Y tế">
                                15. Các đối tượng khác theo Quyết định của Bộ trưởng Bộ Y tế hoặc Chủ tịch Ủy ban nhân
                                dân tỉnh, thành phố và đề xuất của các đơn vị viện trợ vắc xin cho Bộ Y tế
                            </option>
                        </optgroup>
                    </select>
                    <div class="invalid-feedback">
                        Vui chọn nhóm đối tượng ưu tiên
                    </div>
                </div>
                <div class="col-md-4 mb-6">
                    <label for="ngaymongmuon" class="form-label">Ngày muốn được tiêm (dự kiến)</label>
                    <input id="ngaymongmuon" name="ngaymongmuon" type="date" placeholder="" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="province">Tỉnh/Thành Phố</label>
                    <select id="province" class="form-control" name="province"></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="district">Quận/huyện</label>
                    <select id="district" class="form-control" name="district"></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="ward">Phường/xã</label>
                    <select id="ward" class="form-control" name="ward"></select>
                </div>
            </div>
            <h3 class="mt-5" style="color: var(--primary-color);">Tiền sử bệnh</h3>
            <div class="form-row mt-5">
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh1">1. Tiền sử phản vệ từ độ 2 trở lên</label>
                    <input type="checkbox" value="Tiền sử phản vệ từ độ 2 trở lên" name="tiensu[]" id="benh1">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh2">2. Tiền sử bị covid 19 trong vòng 6 tháng</label>
                    <input type="checkbox" value="Tiền sử bị covid 19 trong vòng 6 tháng" name="tiensu[]" id="benh2">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh3">3. Tiền sử tiêm vắc xin khác trong 14 ngày qua</label>
                    <input type="checkbox" value="Tiền sử tiêm vắc xin khác trong 14 ngày qua" name="tiensu[]"
                        id="benh3">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh4">4. Tiền sử suy giảm miễn dịch, ung thư giai đoạn cuối , cắt lách, sơ
                        gan mất bù...</label>
                    <input type="checkbox"
                        value="Tiền sử suy giảm miễn dịch, ung thư giai đoạn cuối , cắt lách, sơ gan mất bù..."
                        name="tiensu[]" id="benh4">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh5">5. Đang dùng thuốc ức chế miễn dịch, corticoid liều ca hoặc điều trị
                        hóa trị, xạ trị</label>
                    <input type="checkbox"
                        value="Đang dùng thuốc ức chế miễn dịch, corticoid liều ca hoặc điều trị hóa trị, xạ trị"
                        name="tiensu[]" id="benh5">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh6">6. Bệnh cấp tính</label>
                    <input type="checkbox" value="Bệnh cấp tính" name="tiensu[]" id="benh6">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh7">7. Tiền sử bệnh mạn tính, đang tiến triển</label>
                    <input type="checkbox" value="Tiền sử bệnh mạn tính, đang tiến triển" name="tiensu[]" id="benh7">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh8">8. Tiền sử bệnh mạn tính đã điều trị ổn</label>
                    <input type="checkbox" value="Tiền sử bệnh mạn tính đã điều trị ổn" name="tiensu[]" id="benh8">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh9">9. Đang mang thai, phụ nữ đang nuôi con bằng sữa mẹ</label>
                    <input type="checkbox" value="Đang mang thai, phụ nữ đang nuôi con bằng sữa mẹ" name="tiensu[]"
                        id="benh9">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh10">10. Độ tuổi từ 65 trở lên</label>
                    <input type="checkbox" value="Độ tuổi từ 65 trở lên" name="tiensu[]" id="benh10">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh11">11. Tiền sử rối loạn đông máu/cầm máu hoặc đang dùng thuốc chống
                        đông</label>
                    <input type="checkbox" value="Tiền sử rối loạn đông máu/cầm máu hoặc đang dùng thuốc chống đông"
                        name="tiensu[]" id="benh11">
                </div>
                <div class="col-md-6 mb-10 tiensubenh">
                    <label class="mr-3" for="benh12">12. Tiền sử dị ứng các di nguyên khác</label>
                    <input type="checkbox" value="Tiền sử dị ứng các di nguyên khác" name="tiensu[]" id="benh12">
                </div>
            </div>

            <div class="button-wrap">
                <a href="./"><button type="button" class="button cancel-btn">Huỷ bỏ</button></a>
                <button type="submit" class="form-submit button register-btn">Đăng ký</button>
            </div>
        </form>
    </div>

    <!-- main -->
    <?php $this->view('frontend.public.js.boostrapJS');?>
    <?php $this->view('frontend.public.footer') ?>
    <?php $this->view('frontend.public.vietnamlocalselectormaster.vietnamlocalselector') ?>
</body>

</html>