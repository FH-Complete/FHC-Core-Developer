export default {
	template: `
<div class="card card-body bg-light mt-3">
<code><pre>
<span class="text-muted">// Import the Core BaseLayout and -Tabs Component</span>
import CoreBaseLayout from '../../../../../js/components/layout/BaseLayout.js';
import CoreTabs from '../../../../../js/components/Tabs.js';
import { absoluteJsImportUrl } from '../../../../../js/helpers/UrlHelpers.js';

export const myComponent = {
	components: { 
	  CoreBaseLayout, 
	  CoreTabs 
	},
	data: () => {
	  return {
        <span class="text-muted">// Define your tabs object like this</span>
	    tabs : {
			// see helper below; must use absolute paths to not break imports after bundling
          	tab1: { title: 'Tab 1', component: absoluteJsImportUrl('../mypath/MyComponent1.js') },
          	tab2: { title: 'Tab 2', component: absoluteJsImportUrl('../mypath/MyComponent2.js') },
          	tab3: { title: 'Tab 3', component: absoluteJsImportUrl('../mypath/MyComponent3.js') }
	    }
	  }
	},
},

&lt;core-base-layout
	title="Title"
	subtitle="Subtitle"&gt;
	&lt;template #main&gt;	
	    <span class="text-muted">// Your Core Tabs Component here</span>
	    &lt;core-tabs :config="tabs"&gt;&lt;/core-tabs&gt;
	&lt;/template&gt;
&lt;/core-base-layout&gt;			
</pre></code>
</div>
`
};