new DataTable('#branch', {
    ajax: {
        url: "./ajax/super/branch_view_ajax.php",
        type: "POST",
        dataSrc: "data"
      }
});
