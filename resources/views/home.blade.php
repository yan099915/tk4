@extends('layouts.main')

@section('container')
<div class="flex flex-row">
  <div class="shadow-lg rounded-lg overflow-hidden w-1/2 mx-2 my-6">
    <canvas class="p-10" id="chartBar1"></canvas>
  </div>
  <div class="shadow-lg rounded-lg overflow-hidden w-1/2 mx-2 my-6">
    <canvas class="p-10" id="chartBar2"></canvas>
  </div>
</div>
<div class="flex flex-row">
  <div class="shadow-lg rounded-lg overflow-hidden w-1/2 mx-2 my-6">
    <canvas class="p-10" id="chartBar3"></canvas>
  </div>
  <div class="shadow-lg rounded-lg overflow-hidden w-1/2 mx-2 my-6">
    <canvas class="p-10" id="chartBar4"></canvas>
  </div>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Chart bar -->
<script type="text/javascript">
  const labelsBarChart = [
    "Jawaban A",
    "Jawaban B",
    "Jawaban C",
    "Jawaban D",
    "Jawaban E"
  ];

  const dataBarChart1 = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "CORPORATE CONTRIBUTION",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: <?php echo json_encode($dimensi_1); ?>,
      },
    ],
  };

  const dataBarChart2 = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "STAKEHOLDER (USER) ORIENTATION",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: <?php echo json_encode($dimensi_2); ?>,
      },
    ],
  };

  const dataBarChart3 = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "OPERATIONAL EXCELLENCE (KEUNGGULAN OPERASIONAL)",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: <?php echo json_encode($dimensi_3); ?>,
      },
    ],
  };

  const dataBarChart4 = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "FUTURE ORIENTATION (Orientasi Masa Depan)",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: <?php echo json_encode($dimensi_4); ?>,
      },
    ],
  };

  const configBarChart1 = {
    type: "bar",
    data: dataBarChart1,
    options: {},
  };
  const configBarChart2 = {
    type: "bar",
    data: dataBarChart2,
    options: {},
  };
  const configBarChart3 = {
    type: "bar",
    data: dataBarChart3,
    options: {},
  };
  const configBarChart4 = {
    type: "bar",
    data: dataBarChart4,
    options: {},
  };

  var chartBar1 = new Chart(
    document.getElementById("chartBar1"),
    configBarChart1
  );
  var chartBar2 = new Chart(
    document.getElementById("chartBar2"),
    configBarChart2
  );
  var chartBar3 = new Chart(
    document.getElementById("chartBar3"),
    configBarChart3
  );
  var chartBar4 = new Chart(
    document.getElementById("chartBar4"),
    configBarChart4
  );
</script>
@endsection