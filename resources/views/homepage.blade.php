<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/homepage.js'])

    <title>Statistik Lokasi</title>
</head>
<body class="bg-gray-100">
    <!-- MAP -->
    <section class="relative z-0 w-full h-screen">
        <div id="map" class="w-full h-full"></div>
    </section>

    <!-- PANEL STATISTIK -->
    <section class="absolute z-10 top-2 left-2 w-[28rem] bottom-2 grid grid-cols-1 gap-2">
    <!-- Bar Chart Lokasi -->
        <div class="bg-white/40 backdrop-blur-md rounded-xl p-5 border border-white overflow-y-auto">
            <h2 class="text-base font-semibold mb-4">Statistik Aktivitas Sosial</h2>
            <canvas id="locationStatsChart" class="h-72"></canvas>
        </div>

        <!-- Indikator Lokasi Paling Disukai -->
        <div class="bg-white/40 backdrop-blur-md rounded-xl p-5 border border-white overflow-y-auto">
            <h3 class="text-base font-semibold mb-3">Lokasi Paling Disukai (Sentimen Positif)</h3>
            <canvas id="sentimentRankingChart" class="h-64"></canvas>
        </div>

        <!-- Trend Chart Per Lokasi -->
        <div class="bg-white/40 backdrop-blur-md rounded-xl p-5 border border-white overflow-y-auto">
            <h3 class="text-base font-semibold mb-3">Trend Aktivitas (6 Bulan Terakhir)</h3>
            @foreach ($locations as $loc)
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-700 mb-1">{{ $loc->name }}</p>
                    <canvas id="trendChart-{{ $loc->id }}" class="h-48"></canvas>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const locations = @json($locations);
            const trendData = @json($trendData);
            const sentimentSummary = @json($sentimentSummary);

            // ================= BAR CHART =================
            const labels = locations.map(loc => loc.name);
            const likes = locations.map(loc => loc.social_posts[0]?.total_likes || 0);
            const comments = locations.map(loc => loc.social_posts[0]?.total_comments || 0);
            const shares = locations.map(loc => loc.social_posts[0]?.total_shares || 0);

            const ctxBar = document.getElementById("locationStatsChart").getContext("2d");
            new Chart(ctxBar, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [
                        { label: "Likes 👍", data: likes, backgroundColor: "#22c55e" },
                        { label: "Comments 💬", data: comments, backgroundColor: "#3b82f6" },
                        { label: "Shares 🔁", data: shares, backgroundColor: "#f59e0b" }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: "bottom" } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // ================= SENTIMENT RANKING (Stacked Bar seperti contoh) =================
            const sentimentLabels = Object.keys(sentimentSummary).map(id => {
                const loc = locations.find(l => l.id == id);
                return loc ? loc.name : `Lokasi #${id}`;
            });

            const positives = Object.values(sentimentSummary).map(s => s.positive);
            const neutrals  = Object.values(sentimentSummary).map(s => s.neutral);
            const negatives = Object.values(sentimentSummary).map(s => s.negative);

            const ctxSentiment = document.getElementById("sentimentRankingChart").getContext("2d");
            new Chart(ctxSentiment, {
                type: "bar",
                data: {
                    labels: sentimentLabels,
                    datasets: [
                        {
                            label: "Positif (%)",
                            data: positives,
                            backgroundColor: "#22c55e"
                        },
                        {
                            label: "Netral (%)",
                            data: neutrals,
                            backgroundColor: "#9ca3af"
                        },
                        {
                            label: "Negatif (%)",
                            data: negatives,
                            backgroundColor: "#ef4444"
                        }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: {
                        legend: { position: "bottom" },
                        tooltip: {
                            callbacks: {
                                label: ctx => `${ctx.dataset.label}: ${ctx.formattedValue}%`
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            min: 0,
                            max: 100,
                            ticks: { callback: v => v + "%" }
                        },
                        y: { stacked: true }
                    }
                }
            });


            // ================= CARI TIMELINE TERBARU =================
            const allMonths = [];
            Object.values(trendData).forEach(data => {
                data.forEach(d => allMonths.push(d.month));
            });
            const maxMonth = allMonths.sort().at(-1);

            const formatMonth = (ym) => {
                const [y, m] = ym.split("-");
                const date = new Date(y, m - 1, 1);
                return date.toLocaleDateString("id-ID", { month: "short", year: "numeric" });
            };

            const generateMonths = (latest, count = 6) => {
                const [y, m] = latest.split("-");
                const latestDate = new Date(parseInt(y), parseInt(m) - 1, 1);

                const months = [];
                for (let i = count - 1; i >= 0; i--) {
                    const d = new Date(latestDate.getFullYear(), latestDate.getMonth() - i, 1);
                    const ym = d.toISOString().slice(0, 7);
                    months.push(ym);
                }
                return months;
            };
            const globalMonths = generateMonths(maxMonth, 6);

            // ================= TREND CHART PER LOKASI =================
            Object.entries(trendData).forEach(([locationId, data]) => {
                const canvasId = `trendChart-${locationId}`;
                const ctx = document.getElementById(canvasId)?.getContext("2d");
                if (!ctx) return;

                const dataMap = Object.fromEntries(data.map(d => [d.month, d.total]));
                const totals = globalMonths.map(m => dataMap[m] || 0);

                new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: globalMonths.map(formatMonth),
                        datasets: [{
                            label: "Aktivitas",
                            data: totals,
                            borderColor: "#3179ED",
                            backgroundColor: "rgba(49, 121, 237, 0.2)",
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true,
                            pointRadius: 2,
                            pointBackgroundColor: "#3179ED"
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: ctx => `${ctx.formattedValue} aktivitas`
                                }
                            }
                        },
                        scales: { y: { beginAtZero: true } }
                    }
                });
            });
        });
    </script>

    <script>
        // Data lokasi untuk map (Leaflet / JS di file homepage.js)
        window.locationsData = @json($locations);
    </script>
</body>
</html>
