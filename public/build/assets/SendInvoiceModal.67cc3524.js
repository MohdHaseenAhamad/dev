import{Q as O,H,u as Q,P as X,aI as J,e as K,g as I,y as W,l as h,h as p,i as B,j as N,k as Y,r as d,o as _,n as M,w as n,b as v,q as f,t as $,m as e,a,c as U,E as Z,U as x}from"./main.d0ffa6eb.js";const ee={class:"flex justify-between w-full"},oe={key:0,action:""},te={class:"px-8 py-8 sm:p-6"},ae={class:"z-0 flex justify-end p-4 border-t border-gray-200 border-solid"},re={key:1},se={class:"my-6 mx-4 border border-gray-200 relative"},le=f(" Edit "),ne=["src"],ie={class:"z-0 flex justify-end p-4 border-t border-gray-200 border-solid"},ce={setup(ue){const c=O(),j=H(),P=Q(),k=X();J();const{t:u}=K();let i=I(!1);const C=I(""),b=I(!1),D=I(["customer","customerCustom","invoice","invoiceCustom","company"]),r=W({id:null,from:null,to:null,subject:"New Invoice",body:null}),G=h(()=>c.active&&c.componentName==="SendInvoiceModal"),z=h(()=>c.title),q=h(()=>c.data),E={from:{required:p.withMessage(u("validation.required"),B),email:p.withMessage(u("validation.email_incorrect"),N)},to:{required:p.withMessage(u("validation.required"),B),email:p.withMessage(u("validation.email_incorrect"),N)},subject:{required:p.withMessage(u("validation.required"),B)},body:{required:p.withMessage(u("validation.required"),B)}},t=Y(E,h(()=>r));function F(){b.value=!1}async function L(){let s=await j.fetchBasicMailConfig();r.id=c.id,s.data&&(r.from=s.data.from_mail),q.value&&(r.to=q.value.customer.email),r.body=j.selectedCompanySettings.invoice_mail_body}async function S(){if(t.value.$touch(),t.value.$invalid)return!0;try{if(i.value=!0,!b.value){const m=await k.previewInvoice(r);i.value=!1,b.value=!0;var s=new Blob([m.data],{type:"text/html"});C.value=URL.createObjectURL(s);return}if((await k.sendInvoice(r)).data.success)return y(),!0}catch(o){console.error(o),i.value=!1,P.showNotification({type:"error",message:u("invoices.something_went_wrong")})}}function y(){c.closeModal(),setTimeout(()=>{t.value.$reset(),b.value=!1,C.value=null},300)}return(s,o)=>{const m=d("BaseIcon"),V=d("BaseInput"),w=d("BaseInputGroup"),R=d("BaseCustomInput"),T=d("BaseInputGrid"),g=d("BaseButton"),A=d("BaseModal");return _(),M(A,{show:e(G),onClose:y,onOpen:L},{header:n(()=>[v("div",ee,[f($(e(z))+" ",1),a(m,{name:"XIcon",class:"w-6 h-6 text-gray-500 cursor-pointer",onClick:y})])]),default:n(()=>[b.value?(_(),U("div",re,[v("div",se,[a(g,{class:"absolute top-4 right-4",disabled:e(i),variant:"primary-outline",onClick:F},{default:n(()=>[a(m,{name:"PencilIcon",class:"h-5 mr-2"}),le]),_:1},8,["disabled"]),v("iframe",{src:C.value,frameborder:"0",class:"w-full",style:{"min-height":"500px"}},null,8,ne)]),v("div",ie,[a(g,{class:"mr-3",variant:"primary-outline",type:"button",onClick:y},{default:n(()=>[f($(s.$t("general.cancel")),1)]),_:1}),a(g,{loading:e(i),disabled:e(i),variant:"primary",type:"button",onClick:o[7]||(o[7]=l=>S())},{default:n(()=>[e(i)?x("",!0):(_(),M(m,{key:0,name:"PaperAirplaneIcon",class:"h-5 mr-2"})),f(" "+$(s.$t("general.send")),1)]),_:1},8,["loading","disabled"])])])):(_(),U("form",oe,[v("div",te,[a(T,{layout:"one-column",class:"col-span-7"},{default:n(()=>[a(w,{label:s.$t("general.from"),required:"",error:e(t).from.$error&&e(t).from.$errors[0].$message},{default:n(()=>[a(V,{modelValue:e(r).from,"onUpdate:modelValue":o[0]||(o[0]=l=>e(r).from=l),type:"text",invalid:e(t).from.$error,onInput:o[1]||(o[1]=l=>e(t).from.$touch())},null,8,["modelValue","invalid"])]),_:1},8,["label","error"]),a(w,{label:s.$t("general.to"),required:"",error:e(t).to.$error&&e(t).to.$errors[0].$message},{default:n(()=>[a(V,{modelValue:e(r).to,"onUpdate:modelValue":o[2]||(o[2]=l=>e(r).to=l),type:"text",invalid:e(t).to.$error,onInput:o[3]||(o[3]=l=>e(t).to.$touch())},null,8,["modelValue","invalid"])]),_:1},8,["label","error"]),a(w,{error:e(t).subject.$error&&e(t).subject.$errors[0].$message,label:s.$t("general.subject"),required:""},{default:n(()=>[a(V,{modelValue:e(r).subject,"onUpdate:modelValue":o[4]||(o[4]=l=>e(r).subject=l),type:"text",invalid:e(t).subject.$error,onInput:o[5]||(o[5]=l=>e(t).subject.$touch())},null,8,["modelValue","invalid"])]),_:1},8,["error","label"]),a(w,{label:s.$t("general.body"),error:e(t).body.$error&&e(t).body.$errors[0].$message,required:""},{default:n(()=>[a(R,{modelValue:e(r).body,"onUpdate:modelValue":o[6]||(o[6]=l=>e(r).body=l),fields:D.value},null,8,["modelValue","fields"])]),_:1},8,["label","error"])]),_:1})]),v("div",ae,[a(g,{class:"mr-3",variant:"primary-outline",type:"button",onClick:y},{default:n(()=>[f($(s.$t("general.cancel")),1)]),_:1}),a(g,{loading:e(i),disabled:e(i),variant:"primary",type:"button",class:"mr-3",onClick:S},{left:n(l=>[e(i)?x("",!0):(_(),M(m,{key:0,class:Z(l.class),name:"PhotographIcon"},null,8,["class"]))]),default:n(()=>[f(" "+$(s.$t("general.preview")),1)]),_:1},8,["loading","disabled"])])]))]),_:1},8,["show"])}}};export{ce as _};
