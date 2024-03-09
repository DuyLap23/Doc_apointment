
<html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Danh Mục', 'Số lượng sản phẩm '],
        <?php
        foreach ($Thong_ke_cate as $key => $value) {
          $category_name = $value['category_name'];
          $soluong = $value['soluong'];
          extract($value);

          echo "['$category_name', $soluong],";
          # code...
        }
        ?>
      ]);

      var options = {
        title: 'Company Performance',
        hAxis: { title: 'Year', titleTextStyle: { color: '#333' } },
        vAxis: { minValue: 0 }
      };

      var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <div id="chart_div" style="width: 100%; height: 500px;"></div>
</body>

</html>