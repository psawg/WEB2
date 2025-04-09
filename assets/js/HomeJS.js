function loadHTMLComponent(url, id){
    fetch (url)
    .then(response => response.text())
    .then(html =>{
        const elememt = document.getElementById(id)
        if(elememt){
            elememt.innerHTML = html;
        }
    })
    .catch(error =>console.error(error))
}

loadHTMLComponent('/components/Footer.html', 'footer');
loadHTMLComponent('/components/Header.html', 'header');
loadHTMLComponent('/components/Section.html', 'section');
loadHTMLComponent('/components/GTA_VI_Page_Section.html', 'GTAsection');
loadHTMLComponent('/components/RedDead_Page_Section.html', 'RedDeadsection');
loadHTMLComponent('/components/AboutUs_Page_Section.html', 'AboutUssection');
loadHTMLComponent('/components/Minecraft_Page_Section.html', 'Minecraftsection');
loadHTMLComponent('/components/Cyberpunk_Page_Section.html', 'Cyberpunksection');
loadHTMLComponent('/components/ARK_Page_Section.html', 'ARKsection');
loadHTMLComponent('/components/ResidentE8_Page_Section.html', 'ResidentE8section');
// loadHTMLComponent('/components/EldenRing_Page_Section.html', 'EldenRingsection');
loadHTMLComponent('/components/ContactUs_Page_Section.html', 'ContactUsSection');

