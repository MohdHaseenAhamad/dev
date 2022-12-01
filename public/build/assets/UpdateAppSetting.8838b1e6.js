import{u as P,e as j,H as R,aB as Y,g as d,y as I,l as G,r as _,o as n,n as T,w as y,b as t,t as s,m as a,a as g,q as B,U as f,S as J,T as O,c as r,aa as V,a9 as q,E as Q,B as E}from"./main.d0ffa6eb.js";import{L as W}from"./LoadingIcon.272413e7.js";const X={class:"pb-8 ml-0"},Z={class:"text-sm not-italic font-medium input-label"},ee={class:"box-border flex w-16 p-3 my-2 text-sm text-gray-600 bg-gray-200 border border-gray-200 border-solid rounded-md version"},te={key:1,class:"mt-4 content"},se={class:"rounded-md bg-primary-50 p-4 mb-3"},ae={class:"flex"},ne={class:"flex-shrink-0"},ie={class:"ml-3"},re={class:"text-sm font-medium text-primary-800"},le={class:"mt-2 text-sm text-primary-700"},oe={class:"text-sm not-italic font-medium input-label"},de=t("br",null,null,-1),pe={class:"box-border flex w-16 p-3 my-2 text-sm text-gray-600 bg-gray-200 border border-gray-200 border-solid rounded-md version"},ue=["innerHTML"],ce={class:"text-sm not-italic font-medium input-label"},me={class:"w-1/2 mt-2 border-2 border-gray-200 BaseTable-fixed"},_e={width:"70%",class:"p-2 text-sm truncate"},ge={width:"30%",class:"p-2 text-sm text-right"},fe={key:0,class:"inline-block w-4 h-4 ml-3 mr-2 bg-green-500 rounded-full"},he={key:1,class:"inline-block w-4 h-4 ml-3 mr-2 bg-red-500 rounded-full"},ve={key:2,class:"relative flex justify-between mt-4 content"},ye={class:"m-0 mb-3 font-medium sw-section-title"},be={class:"mb-8 text-sm leading-snug text-gray-500",style:{"max-width":"480px"}},xe={key:3,class:"w-full p-0 list-none"},we={class:"m-0 text-sm leading-8"},ke={class:"flex flex-row items-center"},Be={key:0,class:"mr-3 text-xs text-gray-500"},Ne={setup(Ue){const b=P(),{t:x,tm:Se}=j();R(),Y();let h=d(!1),u=d(!1),U=d(""),w=d(""),S=d(null),$=d(null),l=d(!1);const k=I([{translationKey:"settings.update_app.download_zip_file",stepUrl:"/api/v1/update/download",time:null,started:!1,completed:!1},{translationKey:"settings.update_app.unzipping_package",stepUrl:"/api/v1/update/unzip",time:null,started:!1,completed:!1},{translationKey:"settings.update_app.copying_files",stepUrl:"/api/v1/update/copy",time:null,started:!1,completed:!1},{translationKey:"settings.update_app.deleting_files",stepUrl:"/api/v1/update/delete",time:null,started:!1,completed:!1},{translationKey:"settings.update_app.running_migrations",stepUrl:"/api/v1/update/migrate",time:null,started:!1,completed:!1},{translationKey:"settings.update_app.finishing_update",stepUrl:"/api/v1/update/finish",time:null,started:!1,completed:!1}]),v=I({isMinor:Boolean,installed:"",version:""});let L=d(null);window.addEventListener("beforeunload",e=>{l.value&&(e.returnValue="Update is in progress!")}),window.axios.get("/api/v1/app/version").then(e=>{w.value=e.data.version});const D=G(()=>!0);function H(e){switch(N(e)){case"pending":return"text-primary-800 bg-gray-200";case"finished":return"text-teal-500 bg-teal-100";case"running":return"text-blue-400 bg-blue-100";case"error":return"text-danger bg-red-200";default:return""}}async function z(){try{u.value=!0;let e=await window.axios.get("/api/v1/check/update");if(u.value=!1,!e.data.version){b.showNotification({title:"Info!",type:"info",message:x("settings.update_app.latest_message")});return}e.data&&(v.isMinor=e.data.is_minor,v.version=e.data.version.version,U.value=e.data.version.description,S.value=e.data.version.extensions,h.value=!0,L.value=e.data.version.minimum_php_version,$.value=e.data.version.deleted_files)}catch(e){h.value=!1,u.value=!1,E(e)}}async function C(){let e=null;if(!D.value)return b.showNotification({type:"error",message:"Your current configuration does not match the update requirements. Please try again after all the requirements are fulfilled."}),!0;for(let p=0;p<k.length;p++){let i=k[p];try{l.value=!0,i.started=!0;let c={version:v.version,installed:w.value,deleted_files:$.value,path:e||null},m=await window.axios.post(i.stepUrl,c);i.completed=!0,m.data&&m.data.path&&(e=m.data.path),i.translationKey=="settings.update_app.finishing_update"&&(l.value=!1,b.showNotification({type:"success",message:x("settings.update_app.update_success")}),setTimeout(()=>{location.reload()},3e3))}catch(c){return i.started=!1,i.completed=!0,E(c),M(i.translationKey),!1}}}function M(e){if(x(e).value){C();return}l.value=!1}function N(e){return e.started&&e.completed?"finished":e.started&&!e.completed?"running":!e.started&&!e.completed?"pending":"error"}return(e,p)=>{const i=_("BaseButton"),c=_("BaseDivider"),m=_("BaseHeading"),A=_("BaseIcon"),F=_("BaseSettingCard");return n(),T(F,{title:e.$t("settings.update_app.title"),description:e.$t("settings.update_app.description")},{default:y(()=>[t("div",X,[t("label",Z,s(e.$t("settings.update_app.current_version")),1),t("div",ee,s(a(w)),1),g(i,{loading:a(u),disabled:a(u)||a(l),variant:"primary-outline",class:"mt-6",onClick:z},{default:y(()=>[B(s(e.$t("settings.update_app.check_update")),1)]),_:1},8,["loading","disabled"]),a(h)?(n(),T(c,{key:0,class:"mt-6 mb-4"})):f("",!0),a(h)?J((n(),r("div",te,[g(m,{type:"heading-title",class:"mb-2"},{default:y(()=>[B(s(e.$t("settings.update_app.avail_update")),1)]),_:1}),t("div",se,[t("div",ae,[t("div",ne,[g(A,{name:"InformationCircleIcon",class:"h-5 w-5 text-primary-400","aria-hidden":"true"})]),t("div",ie,[t("h3",re,s(e.$t("general.note")),1),t("div",le,[t("p",null,s(e.$t("settings.update_app.update_warning")),1)])])])]),t("label",oe,s(e.$t("settings.update_app.next_version")),1),de,t("div",pe,s(a(v).version),1),t("div",{class:"pl-5 mt-4 mb-8 text-sm leading-snug text-gray-500 update-description",style:{"white-space":"pre-wrap","max-width":"480px"},innerHTML:a(U)},null,8,ue),t("label",ce,s(e.$t("settings.update_app.requirements")),1),t("table",me,[(n(!0),r(V,null,q(a(S),(o,K)=>(n(),r("tr",{key:K,class:"p-2 border-2 border-gray-200"},[t("td",_e,s(K),1),t("td",ge,[o?(n(),r("span",fe)):(n(),r("span",he))])]))),128))]),g(i,{class:"mt-10",variant:"primary",onClick:C},{default:y(()=>[B(s(e.$t("settings.update_app.update")),1)]),_:1})],512)),[[O,!a(l)]]):f("",!0),a(l)?(n(),r("div",ve,[t("div",null,[t("h6",ye,s(e.$t("settings.update_app.update_progress")),1),t("p",be,s(e.$t("settings.update_app.progress_text")),1)]),g(W,{class:"absolute right-0 h-6 m-1 animate-spin text-primary-400"})])):f("",!0),a(l)?(n(),r("ul",xe,[(n(!0),r(V,null,q(a(k),o=>(n(),r("li",{key:o.stepUrl,class:"flex justify-between w-full py-3 border-b border-gray-200 border-solid last:border-b-0"},[t("p",we,s(e.$t(o.translationKey)),1),t("div",ke,[o.time?(n(),r("span",Be,s(o.time),1)):f("",!0),t("span",{class:Q([H(o),"block py-1 text-sm text-center uppercase rounded-full"]),style:{width:"88px"}},s(N(o)),3)])]))),128))])):f("",!0)])]),_:1},8,["title","description"])}}};export{Ne as default};
