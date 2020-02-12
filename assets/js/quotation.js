var Quotation=new Array() 
Quotation[0] = "\"Hy vọng là <b>một điều tốt,</b> nhiều khi là <b>điều tốt đẹp nhất.</b> Mà những thứ tốt đẹp <b>thì</b> không bao giờ lụi tàn...\"<br/>- Nhà tù Shawshank";
Quotation[1] = "\"Con người sinh ra vốn <b>bất toàn</b> và để làm <b>những điều lầm lỗi.</b> Nó <b>đẹp</b> vì bất toàn. Nó <b>đáng yêu</b> vì nó <b>luôn luôn lầm lỗi</b>\"<br/>- Trịnh Công Sơn";
Quotation[2] = "\"Khi bạn hát một bản <b>tình ca</b> là bạn đang muốn hát về cuộc tình của mình. Hãy hát đi <b>đừng e ngại.</b> Dù <b>hạnh phúc</b> hay <b>dở dang</b> thì cuộc tình ấy cũng là một phần máu thịt của bạn rồi\"<br/>- Trịnh Công Sơn";
Quotation[3] = "\"Có một thời để <b>sinh ra</b> và <b>chết đi,</b> có một thời để <b>yêu thương</b> và <b>đau khổ,</b> có một thời để <b>hát</b> và <b>nhảy múa,</b> có một thời để <b>hôn</b> và để <b>được hôn,</b> có một thời để <b>tìm kiếm</b> và <b>tìm thấy,</b> có một thời để <b>có tất cả</b> và sau đó <b>mất tất cả</b>. Thời gian để <b>sống</b> và để <b>chết</b>\"";
Quotation[4] = "\"If you <b>can not make the most out of any given moments,</b> you <b>don't deserve a single extra second.</b>\"";
Quotation[5] = "\"Trường Giang cuồn cuộn chảy về Đông<br/>Bạc đầu ngọn sóng cuốn anh hùng<br/>Thịnh suy, thành bại theo dòng nước<br/>Sừng sững cơ đồ bỗng tay không<br/>Núi xanh nguyên vẹn cũ<br/>Bao độ ánh chiều tà<br/>Bạn ngư tiều dãi dầu trên bãi<br/>Vốn đã quen gió mát trăng trong<br/>Một vò rượu nếp vui bạn cũ<br/>Chuyện đời tan trong chén rượu nồng...\"<br/><b>- Tam Quốc Diễn Nghĩa</b>";
var Q = Quotation.length;
var whichQuotation=Math.round(Math.random()*(Q-1));
function showQuotation(){document.write(Quotation[whichQuotation]);}
showQuotation();
