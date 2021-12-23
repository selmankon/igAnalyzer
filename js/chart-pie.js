// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var circles = document.getElementsByClassName("fa-circle");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Karşılıklı Takip", "Takip Etmeyen", "Takip Etmediğin"],
    datasets: [{
      data: [circles[0].id, circles[1].id, circles[2].id],
      backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
      hoverBackgroundColor: ['#2653d4', '#d52a1a', '#2a96a5'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
