# Glochar WordPress Theme

A modern, minimalist WordPress theme with clean design, full-screen hero sections, and responsive grid layouts.

## Theme Features

✨ **Modern Design**

- Clean, minimalist aesthetic
- Full-screen hero sections
- Grid-based layouts
- Smooth animations
- Responsive design

🎨 **Custom Post Types**

- Projects
- Stories
- Systems

📱 **Responsive**

- Mobile-first approach
- Works on all devices
- Touch-friendly navigation

⚡ **Performance Optimized**

- Lazy loading images
- Minimal JavaScript
- Optimized CSS
- Fast loading times

## Installation

### Local Installation (Windows with XAMPP)

1. **Install XAMPP**
   - Download from https://www.apachefriends.org/
   - Install to `C:\xampp`
   - Start Apache and MySQL

2. **Create Database**
   - Open http://localhost/phpmyadmin
   - Create new database: `glochar_wordpress`
   - Or import `database-setup.sql`

3. **Install WordPress**
   - Download WordPress from https://wordpress.org/download/
   - Extract to `C:\xampp\htdocs\glochar`
   - Configure database connection

4. **Install Theme**
   - Copy `glochar-theme` folder to `C:\xampp\htdocs\glochar\wp-content\themes\`
   - Login to WordPress admin
   - Go to Appearance → Themes
   - Activate "Glochar Modern Theme"

### BlueHost Installation

See [bluehost-deployment-guide.md](bluehost-deployment-guide.md) for detailed instructions.

## Theme Setup

### 1. Configure Menus

- Go to Appearance → Menus
- Create "Primary Menu" with these items:
  - Systems
  - Solutions
  - Projects
  - Stories
  - About us
  - Contact
  - Downloads
- Create "Footer Menu" (optional)
- Assign "Primary Menu" to the Primary Menu location
- Save the menu

### 2. Set Front Page

- Go to Settings → Reading
- Select "A static page"
- Choose your home page

### 3. Add Content

- Create pages (About, Contact, etc.)
- Add Projects, Stories, and Systems
- Upload featured images

### 4. Customize

- Go to Appearance → Customize
- Upload logo
- Set colors (if needed)
- Configure site identity

## Recommended Plugins

- **Contact Form 7** - Contact forms
- **Advanced Custom Fields** - Custom fields
- **Yoast SEO** - SEO optimization
- **Smush** - Image optimization
- **WP Super Cache** - Performance

## File Structure

```
glochar-theme/
├── assets/
│   ├── css/
│   │   └── main.css          # Main stylesheet
│   └── js/
│       └── main.js           # JavaScript functionality
├── archive.php               # Archive template
├── footer.php                # Footer template
├── front-page.php            # Home page template
├── functions.php             # Theme functions
├── header.php                # Header template
├── index.php                 # Main template
├── page.php                  # Page template
├── single.php                # Single post template
└── style.css                 # Theme info (required)
```

## Customization

### Colors

Edit CSS variables in `assets/css/main.css`:

```css
:root {
  --color-primary: #000000;
  --color-secondary: #ffffff;
  --color-accent: #333333;
}
```

### Typography

Modify font families in CSS variables:

```css
:root {
  --font-primary: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto;
  --font-heading: "Helvetica Neue", Arial, sans-serif;
}
```

### Spacing

Adjust spacing scale:

```css
:root {
  --spacing-xs: 0.5rem;
  --spacing-sm: 1rem;
  --spacing-md: 2rem;
  --spacing-lg: 4rem;
  --spacing-xl: 6rem;
}
```

## Custom Post Types

### Projects

Display your portfolio projects with images and descriptions.

### Stories

Share blog posts and company news.

### Systems

Showcase your products or services.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Performance Tips

1. **Optimize Images**
   - Use WebP format when possible
   - Compress images before uploading
   - Install image optimization plugin

2. **Enable Caching**
   - Install WP Super Cache
   - Configure caching settings

3. **Minimize Plugins**
   - Only use essential plugins
   - Regularly audit and remove unused plugins

4. **Use CDN**
   - Consider CloudFlare or similar CDN
   - BlueHost offers CDN integration

## Security

1. Keep WordPress updated
2. Use strong passwords
3. Install security plugin (Wordfence)
4. Enable SSL certificate
5. Regular backups

## Support

For issues or questions:

1. Check documentation files
2. Review WordPress support forums
3. Contact your hosting provider

## Credits

- Inspired by modern minimalist design principles
- Built with WordPress best practices
- Follows accessibility guidelines

## License

GNU General Public License v2 or later

## Changelog

### Version 1.0

- Initial release
- Basic theme structure
- Custom post types
- Responsive design
- Mobile menu
- Smooth scrolling
- Grid layouts

---

**Note**: This theme is designed to be a starting point. Customize it to match your brand and requirements.
