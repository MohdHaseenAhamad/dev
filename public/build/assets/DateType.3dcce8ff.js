import{$ as r,l as m,r as p,o as d,n as c,m as f,p as i}from"./main.d0ffa6eb.js";const k={props:{modelValue:{type:[String,Date],default:r().format("YYYY-MM-DD")}},emits:["update:modelValue"],setup(t,{emit:l}){const s=t,e=m({get:()=>s.modelValue,set:o=>{l("update:modelValue",o)}});return(o,a)=>{const u=p("BaseDatePicker");return d(),c(u,{modelValue:f(e),"onUpdate:modelValue":a[0]||(a[0]=n=>i(e)?e.value=n:null)},null,8,["modelValue"])}}};export{k as default};