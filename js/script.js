
    function showTab(tabName) {
      // Hide all tab contents
      const tabContents = document.getElementsByClassName('tab-content');
      for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove('active');
      }

      // Show the selected tab content
      const selectedTabContent = document.getElementById(tabName);
      selectedTabContent.classList.add('active');

      // Update the active tab
      const tabs = document.getElementsByClassName('tab');
      for (let i = 0; i < tabs.length; i++) {
        if (tabs[i].id === tabName) {
          tabs[i].classList.add('active');
        } else {
          tabs[i].classList.remove('active');
        }
      }
    }
  