import React, { useState, useCallback, useEffect } from "react";
import UserCard from "./UserCard";

export default function Wrapper(props) {
  const { attributes } = props;

  const [count, setCount] = useState(attributes.count);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const toggleModal = useCallback(
    () => setIsModalOpen((prevState) => !prevState),
    []
  );

  useEffect(() => {
    console.log(attributes);
  }, []);

  return (
    <div className="mt-block-user-card" data-mt-attributes={attributes}>
      <UserCard
        attributes={attributes}
        toggleModal={toggleModal}
        isModalOpen={isModalOpen}
        count={count}
        setCount={setCount}
      />
    </div>
  );
}
