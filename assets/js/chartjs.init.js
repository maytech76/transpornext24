function getChartColorsArray(r) {
  if (null !== document.getElementById(r)) {
    var r = document.getElementById(r).getAttribute("data-colors");
    return (r = JSON.parse(r)).map(function (r) {
      var o = r.replace(" ", "");
      if (-1 === o.indexOf(",")) {
        var a = getComputedStyle(document.documentElement).getPropertyValue(o);
        return a || o;
      }
      r = r.split(",");
      return 2 != r.length
        ? o
        : "rgba(" +
            getComputedStyle(document.documentElement).getPropertyValue(r[0]) +
            "," +
            r[1] +
            ")";
    });
  }
}

var pieChart,
  ispiechart = document.getElementById("pieChart");
(pieChartColors = getChartColorsArray("pieChart")),
  pieChartColors &&
    (pieChart = new Chart(ispiechart, {
      type: "pie",
      data: {
        labels: ["Desktops", "Tablets"],
        datasets: [
          {
            data: [300, 180],
            backgroundColor: pieChartColors,
            hoverBackgroundColor: pieChartColors,
            hoverBorderColor: "#fff",
          },
        ],
      },
      options: {
        plugins: { legend: { labels: { font: { family: "Poppins" } } } },
      },
    }));
var isdoughnutchart = document.getElementById("doughnut");
(doughnutChartColors = getChartColorsArray("doughnut")),
  doughnutChartColors &&
    (lineChart = new Chart(isdoughnutchart, {
      type: "doughnut",
      data: {
        labels: ["Desktops", "Tablets"],
        datasets: [
          {
            data: [300, 210],
            backgroundColor: doughnutChartColors,
            hoverBackgroundColor: doughnutChartColors,
            hoverBorderColor: "#fff",
          },
        ],
      },
      options: {
        plugins: { legend: { labels: { font: { family: "Poppins" } } } },
      },
    }));
