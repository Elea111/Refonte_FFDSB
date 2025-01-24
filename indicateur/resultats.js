document.addEventListener("DOMContentLoaded", function() {
    createBarChart("#ageGraph", ageData, "age", "count", "Répartition des âges");
    createBarChart("#activiteSocialeGraph", activiteSocialeData, "activite", "count", "Heures consacrées aux activités sociales");
    createBarChart("#statutBarChart", statutData, "statut", "count", "Statut professionnel");
    createDonutChart("#soinDonutChart", soinData, "soin", "count");
    createGaugeChart("#soutienGaugeChart", soutienData, "soutien", "count");
});

function createBarChart(selector, data, labelKey, valueKey, title) {
    const svg = d3.select(selector);
    const margin = { top: 60, right: 20, bottom: 40, left: 50 };
    const width = +svg.attr("width") - margin.left - margin.right;
    const height = +svg.attr("height") - margin.top - margin.bottom;
    const g = svg.append("g").attr("transform", `translate(${margin.left},${margin.top})`);

    svg.append("text")
        .attr("x", width / 2 + margin.left)
        .attr("y", 30)
        .attr("text-anchor", "middle")
        .style("font-size", "20px")
        .style("fill", "#01628D")
        .text(title);

    const x = d3.scaleBand().domain(data.map(d => d[labelKey])).range([0, width]).padding(0.2);
    const y = d3.scaleLinear().domain([0, d3.max(data, d => d[valueKey])]).range([height, 0]);

    g.append("g").attr("transform", `translate(0, ${height})`).call(d3.axisBottom(x));
    g.append("g").call(d3.axisLeft(y));

    g.selectAll(".bar").data(data).enter().append("rect")
        .attr("class", "bar")
        .attr("x", d => x(d[labelKey]))
        .attr("y", d => y(d[valueKey]))
        .attr("width", x.bandwidth())
        .attr("height", d => height - y(d[valueKey]));
}

function createDonutChart(selector, data, labelKey, valueKey) {
    const width = 400, height = 400, radius = Math.min(width, height) / 2;
    const svg = d3.select(selector).append("g").attr("transform", `translate(${width / 2}, ${height / 2})`);
    const color = d3.scaleOrdinal(d3.schemeSet3);
    const pie = d3.pie().value(d => d[valueKey]);
    const arc = d3.arc().innerRadius(radius / 2).outerRadius(radius);

    svg.selectAll('path').data(pie(data)).enter().append('path')
        .attr('d', arc)
        .attr('fill', (d, i) => color(i))
        .on("mouseover", function() {
            d3.select(this).style("opacity", 0.7);
        })
        .on("mouseout", function() {
            d3.select(this).style("opacity", 1);
        });
}

function createGaugeChart(selector, data, labelKey, valueKey) {
    const total = d3.sum(data, d => d[valueKey]);
    const ouiValue = (data.find(d => d[labelKey] === "Oui")?.[valueKey] || 0);
    const percentage = (ouiValue / total) * 100;

    const width = 200, height = 200;
    const svg = d3.select(selector)
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", `translate(${width / 2}, ${height / 2})`);

    const arc = d3.arc().innerRadius(60).outerRadius(90).startAngle(0);
    const arcBack = d3.arc().innerRadius(60).outerRadius(90).startAngle(0).endAngle(2 * Math.PI);

    svg.append("path").attr("d", arcBack).attr("fill", "#eee");
    svg.append("path")
        .attr("d", arc.endAngle((percentage / 100) * 2 * Math.PI))
        .attr("fill", "#F5A623");

    svg.append("text")
        .attr("text-anchor", "middle")
        .attr("dy", "0.3em")
        .style("font-size", "24px")
        .text(percentage.toFixed(1) + "%");
}