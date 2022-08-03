import React,{useState} from 'react';
import ReactDOM from 'react-dom';

function Category() {
    alert("");
    const [categries, setCategories] = useState();
    fetch('http://inidev.in/delright/api/categoires')
        .then(response => {
            setCategories(response.data);
  })
  .then(data => console.log(data));
    return (
        <div>
         <div className="col-lg-4 col-md-5">
                    <div className="card">
                        <div className="card-body">
                            <table className="table">
                                <th>id</th>
                                <th>Name</th>
                                <th>image</th>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                </div>
    );
}

export default Category;

if (document.getElementById('category')) {
    ReactDOM.render( <Category/> , document.getElementById('category'));
}