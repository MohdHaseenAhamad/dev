import{ar as U,r as i,o as p,c as E,a,w as n,m as o,H as O,a1 as A,ao as J,e as Q,x as W,f as X,g as M,l as y,h as f,i as P,a4 as Y,a5 as Z,aP as x,k as ee,K as oe,b as B,n as v,t as I,U as q,E as D,q as T,s as ae,aa as re}from"./main.d0ffa6eb.js";import{_ as te,a as ne,b as le,c as ie,d as se}from"./ItemModal.720790e2.js";import{_ as de}from"./SelectTemplateButton.5704c8fd.js";import{_ as me}from"./ExchangeRateConverter.ef383681.js";import{_ as ue}from"./CreateCustomFields.e1e8603d.js";import{_ as ce}from"./TaxTypeModal.fd62b2ec.js";import{_ as fe}from"./PreparedByModal.fa78cd8f.js";import{_ as pe}from"./BankDetailModal.ae909e8c.js";import"./DragIcon.e0a4ab5f.js";import"./ItemUnitModal.dc6156ec.js";import"./SelectNotePopup.f61bb6cc.js";import"./NoteModal.688693f3.js";/* empty css                                                  *//* empty css                                                                      */const ge={class:"grid grid-cols-12 gap-8 mt-6 mb-8"},_e={props:{v:{type:Object,default:null},isLoading:{type:Boolean,default:!1},isEdit:{type:Boolean,default:!1}},setup(t){const e=U();function $(r){e.newProforma.prepared_by_id=r}function S(r){e.newProforma.bank_detail_id=r}return(r,l)=>{const k=i("BaseCustomerSelectPopup"),m=i("BaseInputGroup"),u=i("BaseDatePicker"),b=i("BaseInput"),g=i("BasePreparedBySelect"),C=i("BaseBankDetailSelect"),c=i("BaseInputGrid");return p(),E("div",ge,[a(c,{class:"col-span-12 sm:grid-cols-4 md:grid-cols-4"},{default:n(()=>[a(m,{label:r.$t("invoices.client"),"content-loading":t.isLoading,required:""},{default:n(()=>[a(k,{modelValue:o(e).newProforma.customer,"onUpdate:modelValue":l[0]||(l[0]=d=>o(e).newProforma.customer=d),valid:t.v.customer_id,"content-loading":t.isLoading,type:"proforma",class:"col-span-12 lg:col-span-5 pr-0"},null,8,["modelValue","valid","content-loading"])]),_:1},8,["label","content-loading"]),a(m,{label:r.$t("proformas.proforma_date"),"content-loading":t.isLoading,required:"",error:t.v.proforma_date.$error&&t.v.proforma_date.$errors[0].$message},{default:n(()=>[a(u,{modelValue:o(e).newProforma.proforma_date,"onUpdate:modelValue":l[1]||(l[1]=d=>o(e).newProforma.proforma_date=d),"content-loading":t.isLoading,"calendar-button":!0,"calendar-button-icon":"calendar",disabled:""},null,8,["modelValue","content-loading"])]),_:1},8,["label","content-loading","error"]),a(m,{label:r.$t("proformas.due_date"),"content-loading":t.isLoading,required:"",error:t.v.due_date.$error&&t.v.due_date.$errors[0].$message},{default:n(()=>[a(u,{modelValue:o(e).newProforma.due_date,"onUpdate:modelValue":l[2]||(l[2]=d=>o(e).newProforma.due_date=d),"content-loading":t.isLoading,"calendar-button":!0,"calendar-button-icon":"calendar"},null,8,["modelValue","content-loading"])]),_:1},8,["label","content-loading","error"]),a(m,{label:r.$t("proformas.proforma_number"),"content-loading":t.isLoading,error:t.v.proforma_number.$error&&t.v.proforma_number.$errors[0].$message,required:""},{default:n(()=>[a(b,{disabled:"",modelValue:o(e).newProforma.proforma_number,"onUpdate:modelValue":l[3]||(l[3]=d=>o(e).newProforma.proforma_number=d),"content-loading":t.isLoading,onInput:l[4]||(l[4]=d=>t.v.proforma_number.$touch())},null,8,["modelValue","content-loading"])]),_:1},8,["label","content-loading","error"]),a(m,{label:r.$t("proformas.prepared_by"),"content-loading":t.isLoading},{default:n(()=>[a(g,{type:"Proforma","store-prop":r.newProforma,store:o(e),"content-loading":t.isLoading,onSelect:$,item:o(e).newProforma.prepared_by_id},null,8,["store-prop","store","content-loading","item"])]),_:1},8,["label","content-loading"]),a(m,{label:r.$t("invoices.bank_Detail"),"content-loading":t.isLoading},{default:n(()=>[a(C,{type:"Proforma","store-prop":r.newProforma,store:o(e),"content-loading":t.isLoading,onSelect:S,item:o(e).newProforma.bank_detail_id},null,8,["store-prop","store","content-loading","item"])]),_:1},8,["label","content-loading"]),a(m,{label:r.$t("proformas.upper_margin"),"content-loading":r.isLoadingContent},{default:n(()=>[a(b,{modelValue:o(e).newProforma.upper_margin,"onUpdate:modelValue":l[5]||(l[5]=d=>o(e).newProforma.upper_margin=d),"content-loading":r.isLoadingContent},null,8,["modelValue","content-loading"])]),_:1},8,["label","content-loading"]),a(m,{label:r.$t("proformas.lower_margin"),"content-loading":r.isLoadingContent},{default:n(()=>[a(b,{modelValue:o(e).newProforma.lower_margin,"onUpdate:modelValue":l[6]||(l[6]=d=>o(e).newProforma.lower_margin=d),"content-loading":r.isLoadingContent},null,8,["modelValue","content-loading"])]),_:1},8,["label","content-loading"]),a(me,{store:o(e),"store-prop":"newProforma",v:t.v,"is-loading":t.isLoading,"is-edit":t.isEdit,"customer-currency":o(e).newProforma.currency_id},null,8,["store","v","is-loading","is-edit","customer-currency"])]),_:1})])}}},be=["onSubmit"],Pe={class:"flex"},ve={class:"block mt-10 proforma-foot lg:flex lg:justify-between lg:items-start"},we={class:"relative w-full lg:w-1/2 lg:mr-4"},Te={setup(t){const e=U(),$=O(),S=A();J();const{t:r}=Q();let l=W(),k=X();const m="newProforma";let u=M(!1);const b=M(["customer","company","customerCustom","proforma","proformaCustom"]);let g=y(()=>e.isFetchingProforma||e.isFetchingInitialSettings),C=y(()=>c.value?r("proformas.edit_proforma"):r("proformas.new_proforma")),c=y(()=>l.name==="proformas.edit");const d={proforma_date:{required:f.withMessage(r("validation.required"),P)},due_date:{required:f.withMessage(r("validation.required"),P)},reference_number:{maxLength:f.withMessage(r("validation.price_maxlength"),Y(255))},customer_id:{required:f.withMessage(r("validation.required"),P)},proforma_number:{required:f.withMessage(r("validation.required"),P)},exchange_rate:{required:Z(function(){return f.withMessage(r("validation.required"),P),e.showExchangeRate}),decimal:f.withMessage(r("validation.valid_exchange_rate"),x)}},w=ee(d,y(()=>e.newProforma),{$scope:m});S.resetCustomFields(),w.value.$reset,e.resetCurrentProforma(),e.fetchProformaInitialSettings(c.value),oe(()=>e.newProforma.customer,s=>{s&&s.currency?e.newProforma.selectedCurrency=s.currency:e.newProforma.selectedCurrency=$.selectedCompanyCurrency});async function G(){if(console.log("working"),w.value.$touch(),w.value.$invalid)return!1;u.value=!0;let s={...e.newProforma,sub_total:e.getSubTotal,total:e.getTotal,tax:e.getTotalTax,prepared_by_id:e.newProforma.prepared_by_id?e.newProforma.prepared_by_id.id:"",bank_detail_id:e.newProforma.bank_detail_id?e.newProforma.bank_detail_id.id:""};try{const _=await(c.value?e.updateProforma:e.addProforma)(s);k.push(`/admin/proformas/${_.data.data.id}/view`)}catch(h){console.error(h)}u.value=!1}return(s,h)=>{const _=i("BaseBreadcrumbItem"),N=i("BaseBreadcrumb"),L=i("BaseButton"),H=i("router-link"),F=i("BaseIcon"),R=i("BasePageHeader"),j=i("BaseInputGrid"),z=i("BaseScrollPane"),K=i("BasePage");return p(),E(re,null,[a(te),a(ne),a(fe),a(pe),a(ce),a(K,{class:"relative proforma-create-page"},{default:n(()=>[B("form",{onSubmit:ae(G,["prevent"])},[a(R,{title:o(C)},{actions:n(()=>[s.$route.name==="proformas.edit"?(p(),v(H,{key:0,to:`/proformas/pdf/${o(e).newProforma.unique_hash}`,target:"_blank"},{default:n(()=>[a(L,{class:"mr-3",variant:"primary-outline",type:"button"},{default:n(()=>[B("span",Pe,I(s.$t("general.view_pdf")),1)]),_:1})]),_:1},8,["to"])):q("",!0),a(L,{loading:o(u),disabled:o(u),variant:"primary",type:"submit"},{left:n(V=>[o(u)?q("",!0):(p(),v(F,{key:0,name:"SaveIcon",class:D(V.class)},null,8,["class"]))]),default:n(()=>[T(" "+I(s.$t("proformas.save_proforma")),1)]),_:1},8,["loading","disabled"])]),default:n(()=>[a(N,null,{default:n(()=>[a(_,{title:s.$t("general.home"),to:"/admin/dashboard"},null,8,["title"]),a(_,{title:s.$tc("proformas.proforma",2),to:"/admin/proformas"},null,8,["title"]),s.$route.name==="proformas.edit"?(p(),v(_,{key:0,title:s.$t("proformas.edit_proforma"),to:"#",active:""},null,8,["title"])):(p(),v(_,{key:1,title:s.$t("proformas.new_proforma"),to:"#",active:""},null,8,["title"]))]),_:1})]),_:1},8,["title"]),a(_e,{v:o(w),"is-loading":o(g),"is-edit":o(c)},null,8,["v","is-loading","is-edit"]),a(z,null,{default:n(()=>[a(le,{currency:o(e).newProforma.selectedCurrency,"is-loading":o(g),"item-validation-scope":m,store:o(e),"store-prop":"newProforma"},null,8,["currency","is-loading","store"]),B("div",ve,[B("div",we,[a(ie,{store:o(e),"store-prop":"newProforma",fields:b.value,type:"Invoice"},null,8,["store","fields"])]),a(se,{currency:o(e).newProforma.selectedCurrency,"is-loading":o(g),store:o(e),"store-prop":"newProforma","tax-popup-type":"invoice"},null,8,["currency","is-loading","store"])]),a(j,{class:"sm:grid-cols-4 md:grid-cols-4 col-span-12 mb-4"},{default:n(()=>[a(ue,{type:"Proforma","is-edit":o(c),"is-loading":o(g),store:o(e),"store-prop":"newProforma","custom-field-scope":m,class:"mb-6"},null,8,["is-edit","is-loading","store"]),a(de,{store:o(e),"store-prop":"newProforma","component-name":"ProformaTemplate"},null,8,["store"])]),_:1}),a(L,{loading:o(u),disabled:o(u),variant:"primary",type:"submit"},{left:n(V=>[o(u)?q("",!0):(p(),v(F,{key:0,name:"SaveIcon",class:D(V.class)},null,8,["class"]))]),default:n(()=>[T(" "+I(s.$t("proformas.save_proforma")),1)]),_:1},8,["loading","disabled"])]),_:1})],40,be)]),_:1})],64)}}};export{Te as default};