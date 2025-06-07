$(document).ready(function () {
    // تفعيل الـ Datepicker لتاريخ البداية
    $("#startDate").datepicker({
      format: "yyyy-mm-dd",
      todayBtn: "linked",
      autoclose: true,
      language: "ar",
      clearBtn: true,
      orientation: "bottom auto", 
    });
    $("#endDate").datepicker({
      format: "yyyy-mm-dd",
      todayBtn: "linked",
      autoclose: true,
      language: "ar",
      clearBtn: true,
      orientation: "bottom auto",
    });
  });