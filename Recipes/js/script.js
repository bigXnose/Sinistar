function randomRecipe() {
    const recipes = [
      "https://www.apple.com/",
      "https://www.android.com/",
      
    ];
    const randomIndex = Math.floor(Math.random() * recipes.length);
    window.location.href = recipes[randomIndex];
  }