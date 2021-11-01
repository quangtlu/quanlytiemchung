<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const pdfBtn = document.querySelector("#pdf");
    const table = document.querySelector("#table");

    pdfBtn.onclick = function(){
        
        var element = document.getElementById('table');
        var opt = {
            filename:     'Báo cáo thống kê.pdf',
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' },
            ignore: '.ignore'
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();
    }
</script>