class tom_embedtool {
    // ... toolbox
   cssfile="http://localhost/project/assets/css/tom_embedtool.css";
    // ... constructor
    static get toolbox() {
      return {
        title: 'embed',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM48 368v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H416zM48 240v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H416zM48 112v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zM416 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H416zM160 128v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V128c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zm32 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V320c0-17.7-14.3-32-32-32H192z"/></svg>'
      };
    }
  
    constructor({data}){
      this.data = data;
    }
    render(){
          // Get HTML head element
          let head = document.getElementsByTagName('HEAD')[0];
 
          // Create new link Element
          let link = document.createElement('link');
   
          // set the attributes for link element
          link.rel = 'stylesheet';
       
          link.type = 'text/css';
       
          link.href = this.cssfile;
   
          // Append link element to HTML head
          head.appendChild(link);
      this.wrapper = document.createElement('div');
      this.wrapper.classList.add('simple-image');
  
     if (this.data && this.data.url){
       this._createImage(this.data.url, this.data.caption);
       return this.wrapper;
     }
  
      const input = document.createElement('input');
      input.placeholder = 'Paste an image URL...';
      input.addEventListener('paste', (event) => {
        this._createImage(event.clipboardData.getData('text'));
      });
  
      this.wrapper.appendChild(input);
  
      return this.wrapper;
    }
  
   
   _createImage(url, captionText){
      const image = document.createElement('iframe');
      const div=document.createElement('div');
      const caption = document.createElement('input');
    image.setAttribute('allowFullScreen', '');
      image.src = url;
      caption.placeholder = 'Caption...';
     caption.value = captionText || '';
     div.classList.add('ratio');
     div.classList.add('ratio-16x9');
     div.appendChild(image);
      this.wrapper.innerHTML = '';
      this.data.url=url;
      this.data.caption=caption.value ;
      this.wrapper.appendChild(div);
      this.wrapper.appendChild(caption);
    }
  
  
    save(){
  
      return {
        url:this.data.url, 
        caption:this.data.caption
      }
    }
    // ... save
  
    // ... validate
  }