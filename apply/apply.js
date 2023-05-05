'use strict';

let initial = 0;
document.querySelector("input[name='calculate']").addEventListener("click", function(e) {
    e.preventDefault();
    initial = 0; //Reset Value
    let grades = document.querySelectorAll(".grade");
    let totalSubject = parseInt(grades.length)


    grades.forEach(grade => {
        
        initial += parseFloat(grade.value);
    })
    let finalCalc = (initial / totalSubject).toFixed(4);
    if (!isNaN(finalCalc))
        document.querySelector(".totalGrade").textContent = finalCalc;
    else
        document.querySelector(".totalGrade").textContent = "Please fill up all the grades";
});


