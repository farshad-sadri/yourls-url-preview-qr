# YOURLS URL Preview with QR Code & Thumbnail

A YOURLS plugin that displays a preview page with a **QR code** and a **thumbnail image** of the destination URL — simply by appending `~` to any short link.

## ✨ Features

* Preview screen before redirection
* QR code generation for quick mobile access
* Optional thumbnail preview using a third-party API
* Easy to install and configure

## 🔧 Requirements

* [YOURLS](https://yourls.org) `v1.10+`
* PHP `8.1+` recommended
* Optional: [Thumbnail.ws API key](https://thumbnail.ws/sign-up.html) for website snapshots

---

## 🚀 Installation

1. **Download or clone** this repository into the YOURLS plugin directory:

   ```bash
   cd yourls/user/plugins
   git clone https://github.com/farshad-sadri/yourls-url-preview-qr.git
   ```

   Or [download as ZIP](https://github.com/farshad-sadri/yourls-url-preview-qr/archive/refs/heads/main.zip) and extract it to:

   ```
   /user/plugins/yourls-url-preview-qr
   ```

2. **Optional – Enable thumbnail preview:**

   * Sign up at [thumbnail.ws](https://thumbnail.ws/sign-up.html) to get a free API key.
   * Open `plugin.php` and replace the placeholder `YOUR_FREE_THUMBNAIL_API` with your actual key:

     ```php
     $api_key = 'YOUR_REAL_API_KEY';
     ```

3. **Activate the plugin** from the YOURLS admin dashboard:
   `http://your-short-domain/admin/plugins.php`

---

## ⚙️ Usage

Once the plugin is active:

* To **view the preview screen**, append `~` to any short URL:

  ```
  http://sho.rt/abc123~
  ```

* The preview page includes:

  * A **QR code** for mobile scanning
  * A **thumbnail** of the destination website (if API is configured)

---

## 🧪 Example

| Feature     | Output                                  |
| ----------- | --------------------------------------- |
| URL         | `http://sho.rt/demo~`                   |
| Preview     | Shows a thumbnail + QR code             |
| Redirection | Not triggered – user must click through |

---

## 📜 License

[MIT License](LICENSE)

---

## 🤝 Contributions

Feedback and pull requests are welcome! If you encounter a bug or have a feature idea, feel free to [open an issue](https://github.com/farshad-sadri/yourls-url-preview-qr/issues).


Great — here’s a professional yet personal **“About the Author”** section you can append to the end of the `README.md`. It communicates credibility without overselling, and it’s aligned with your strategic goals (visibility, authority, and quality inbound leads).

---

## 👨‍💻 About the Author

**Farshad Sadri** is a design technologist and product strategist with over 25 years of experience crafting human-centered digital experiences. He leads cross-functional initiatives at the intersection of product design, frontend development, and emerging tech — including AI, Web3, and creative automation.

Farshad is also the founder of [Dash Squid](https://dashsquid.com), a design studio helping companies build memorable brands and scalable digital products.

* Portfolio: [farshadsadri.com](https://farshadsadri.com)
* GitHub: [@farshad-sadri](https://github.com/farshad-sadri)
* LinkedIn: [linkedin.com/in/farshadsadri](https://www.linkedin.com/in/farshadsadri)


---
### 🙏 Credits

This plugin is a fork of the original project by [Denny Dai](https://github.com/DennyDai/yourls-preview-url-with-qrcode), extended and modernized for improved maintainability and added features like thumbnail preview.
