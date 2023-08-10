/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./pages/*.{php,js}"],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      width: {
        content: "calc(100% - 280px)",
        md: "calc(100% - 60px)",
      },
      backgroundImage: {
        bgBanner:
          "url(https://news.codashop.com/ph/wp-content/uploads/sites/5/2020/10/Halloween-Banner-Mobile-Legends-1024x576.jpg)",
      },
      boxShadow: {
        nav: "-20px -20px 0 #fff",
      },
      gridTemplateColumns: {
        boxInfo: " repeat(auto-fit, minmax(240px, 1fr))",
      },
    },
  },
  plugins: [],
};
