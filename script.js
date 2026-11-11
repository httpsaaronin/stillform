
document.addEventListener("DOMContentLoaded", () => {
    const CART_STORAGE_KEY = "stillform_cart";

    let cart = [];

    // Load saved cart
    try {
        const savedCart = localStorage.getItem(CART_STORAGE_KEY);

        if (savedCart) {
            const parsedCart = JSON.parse(savedCart);

            if (Array.isArray(parsedCart)) {
                cart = parsedCart.filter(item =>
                    item &&
                    typeof item.name === "string" &&
                    Number.isFinite(item.price) &&
                    item.price >= 0 &&
                    Number.isInteger(item.quantity) &&
                    item.quantity > 0
                );
            }
        }
    } catch (error) {
        console.error("Could not load saved cart:", error);
    }

    function saveCart() {
        try {
            localStorage.setItem(
                CART_STORAGE_KEY,
                JSON.stringify(cart)
            );
        } catch (error) {
            console.error("Could not save cart:", error);
        }
    }

    // Cart elements
    const panel = document.getElementById("cart-panel");
    const overlay = document.getElementById("cart-overlay");
    const itemsContainer = document.getElementById("cart-items");
    const countDisplay = document.getElementById("cart-count");
    const totalDisplay = document.getElementById("cart-total");
    const message = document.getElementById("cart-message");

    function openCart() {
        panel?.classList.add("active");
        overlay?.classList.add("active");
    }

    function closeCart() {
        panel?.classList.remove("active");
        overlay?.classList.remove("active");
    }

    // Render cart
    function renderCart() {
        let total = 0;
        let count = 0;

        cart.forEach(item => {
            total += item.price * item.quantity;
            count += item.quantity;
        });

        if (countDisplay) {
            countDisplay.textContent = count;
        }

        if (totalDisplay) {
            totalDisplay.textContent =
                "₹" + total.toLocaleString("en-IN");
        }

        // Product preview pages may not contain cart panel
        if (!itemsContainer) {
            return;
        }

        itemsContainer.innerHTML = "";

        if (cart.length === 0) {
            itemsContainer.innerHTML =
                '<p class="empty-cart">Your bag is empty.</p>';
            return;
        }

        cart.forEach((item, index) => {
            const row = document.createElement("div");
            row.className = "cart-item";

            const name = document.createElement("strong");
            name.textContent = item.name;

            const price = document.createElement("p");
            price.textContent =
                "₹" + item.price.toLocaleString("en-IN");

            if (item.size) {
                const size = document.createElement("p");
                size.textContent = "Size: " + item.size;
                row.appendChild(size);
            }

            const controls = document.createElement("div");
            controls.className = "cart-item-controls";

            const minus = document.createElement("button");
            minus.textContent = "−";

            minus.onclick = () => {
                item.quantity--;

                if (item.quantity <= 0) {
                    cart.splice(index, 1);
                }

                saveCart();
                renderCart();
            };

            const quantity = document.createElement("span");
            quantity.textContent = item.quantity;

            const plus = document.createElement("button");
            plus.textContent = "+";

            plus.onclick = () => {
                item.quantity++;
                saveCart();
                renderCart();
            };

            const remove = document.createElement("button");
            remove.textContent = "✕";

            remove.onclick = () => {
                cart.splice(index, 1);
                saveCart();
                renderCart();
            };

            controls.append(minus, quantity, plus, remove);
            row.append(name, price, controls);

            itemsContainer.appendChild(row);
        });
    }

    // Add products to cart
    document.querySelectorAll(".add-button").forEach(button => {
        button.addEventListener("click", () => {
            const name = button.dataset.name;
            const price = Number(button.dataset.price);

            const quantitySelect =
                document.getElementById("quantity");

            const sizeSelect =
                document.getElementById("size");

            const quantity = quantitySelect
                ? Number(quantitySelect.value)
                : 1;

            const size = sizeSelect
                ? sizeSelect.value
                : "";

            if (
                !name ||
                !Number.isFinite(price) ||
                !Number.isInteger(quantity) ||
                quantity < 1
            ) {
                console.error("Invalid product information.");
                return;
            }

            // Match product by name and selected size
            const existing = cart.find(item =>
                item.name === name &&
                (item.size || "") === size
            );

            if (existing) {
                existing.quantity += quantity;
            } else {
                cart.push({
                    name,
                    price,
                    quantity,
                    size
                });
            }

            saveCart();
            renderCart();

            if (message) {
                message.textContent = "";
            }

            // Open cart if available
            if (panel && overlay) {
                openCart();
            } else {
                const note =
                    document.querySelector(".size-note");

                if (note) {
                    note.textContent =
                        quantity + " item(s) added to your bag ✓";
                }
            }
        });
    });

    // Cart buttons
    document.querySelector(".cart-button")
        ?.addEventListener("click", openCart);

    document.getElementById("close-cart")
        ?.addEventListener("click", closeCart);

    overlay?.addEventListener("click", closeCart);

    // Checkout demo
    document.getElementById("checkout-button")
        ?.addEventListener("click", () => {
            if (message) {
                message.textContent = cart.length
                    ? "Demo only — online checkout is not connected yet."
                    : "Your bag is empty.";
            }
        });

    // Reveal animations
    const revealElements =
        document.querySelectorAll(".reveal");

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        revealElements.forEach(element =>
            observer.observe(element)
        );
    } else {
        revealElements.forEach(element =>
            element.classList.add("visible")
        );
    }

    renderCart();
});
