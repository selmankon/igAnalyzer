// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "lengthChange": false,
    "language": {
      "zeroRecords": " ",
      "info": "Sayfa: _PAGE_/_PAGES_",
      "infoEmpty": "Veri bulunamadı.",
      "infoFiltered": "(Toplam _MAX_ kayıttan filtrelendirildi.)",
      "search": "Ara:",
      "paginate": {
        "previous": "<<",
        "next": ">>"
      }
  }});
});
